<?php

namespace App\Http\Services;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartService {

    public function create($request) {
        $quantily = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');
        if($quantily <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc sản phẩm không chính xác');
            return false;
        }
        $carts = Session::get('carts');
        if(is_null($carts)) {
            Session::put('carts', [
                $product_id => $quantily
            ]);
            return true;
        }
        $exists = Arr::exists($carts, $product_id);
        if($exists) {
            $carts[$product_id] = $carts[$product_id] + $quantily;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $quantily;
        Session::put('carts', $carts);
        return true;
    }

    public function getProduct() {
        $carts = Session::get('carts');
        if(is_null($carts)) {
            return [];
        }
        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'feature_image_path')->whereIn('id', $productId)->get();
    }

    public function update($request) {
        Session::put('carts', $request->input('num_product'));
        return true;
    }

    public function delete($id) {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request) {
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');
            if(is_null($carts)) {
                return false;
            }

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'district' => $request->input('district'),
                'city' => $request->input('city'),
                'note' => $request->input('note')
            ]);

            $this->infoProductCart($carts, $customer->id);
            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');
            // send mail
            Mail::send('email.mail_order_test', compact('customer', 'carts'), function($email) use($customer, $carts){
                $email->subject('Email xác nhận đơn hàng');
                $email->to($customer->email, $customer->name, $carts);
            });

            //xoá giỏ hàng
            Session::flush();
            
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Thất Bại, Vui Lòng Thử Lại Sau');
            return false;
        }
        return true;
    }
    
    protected function infoProductCart($carts, $customer_id) {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'feature_image_path')->whereIn('id', $productId)->get();
        $data = [];
        foreach($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'quantily' => $carts[$product->id],
                'price' => $product->price
            ];
        }
        return Cart::insert($data);
    }

    //admin
    public function getCustomer() {
        return Customer::orderByDesc('id')->paginate(5);
    }

    public function getProductForCart($customer) {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'feature_image_path');
        }])->get();
    }
}