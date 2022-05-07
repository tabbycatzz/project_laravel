<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index() {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(8)->get();
        $productsRecommend = Product::latest('views', 'desc')->take(8)->get();
        $productsApple = Product::where('category_id',24)->take(5)->get();
        $productsMontiorLG = Product::where('category_id',36)->take(4)->get();
        $productsMontiorAcer = Product::where('category_id',37)->take(4)->get();
        $productsKeyboardAkko = Product::where('category_id',41)->take(4)->get();
        $productsMouseLogitech = Product::where('category_id',43)->take(4)->get();
        return view('main', [
            'title' => 'Shop Laptop'
        ], compact('sliders', 'categories', 'products',
         'productsRecommend', 'productsApple', 'productsMontiorLG', 'productsMontiorAcer', 'productsKeyboardAkko', 'productsMouseLogitech'));
    }

    public function email() {
        $name = 'test email';
        Mail::send('email.test', compact('name'), function($email) use($name){
            $email->subject('Demo test mail');
            $email->to('kyanhtabby22@gmail.com', $name);
        });
    }
}
