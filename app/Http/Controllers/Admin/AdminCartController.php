<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

class AdminCartController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;       
    }

    public function index() {
        return view('admin.cart.index', [
            'title' => 'Danh sách đơn hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer) {
        $carts = $this->cart->getProductForCart($customer);
        return view('admin.cart.detail', [
            'title' => 'Chi tiết đơn hàng' .$customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }

    public function active($id) {
        $status = Customer::find($id);
        $status->status = Customer::STATUS_DONE;
        $status->save();
        return redirect()->back()->with('success', 'Xử lý đơn hàng thành công');
    }

    public function delete($id) {
        try {
            $status = Customer::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete Success'
            ], 200);
        } catch(\Exception $exception) {
            Log::error('Error:' . $exception->getMessage() . '---Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Delete Fail'
            ], 500);
        }
    }
}
