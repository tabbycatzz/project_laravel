<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    
    public function index(Request $request) {
        $result = $this->cartService->create($request);
        if($result == false) {
            return redirect()->back();
        }
        return redirect('/carts');
    }

    public function show() {
        $products = $this->cartService->getProduct();
        //show danh mục sản phẩm ở trang cart
        $categories = Category::where('parent_id', 0)->get();
        return view('index.carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts'),
            'categories' => $categories
        ]);
    }

    public function update(Request $request) {
        $this->cartService->update($request);
        return redirect('/carts');
    }

    public function delete($id = 0) {
        $this->cartService->delete($id);
        return redirect('/carts');
    }

    public function addCart(Request $request) {
        $this->cartService->addCart($request);
        return redirect()->back();
    }
}
