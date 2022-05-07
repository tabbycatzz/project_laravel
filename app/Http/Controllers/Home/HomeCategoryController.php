<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeCategoryController extends Controller
{
    public function index($slug, $categoryId) {
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::where('category_id', $categoryId)->paginate(8);
        return view('index.product.category.list_product', compact('categories', 'products'));
    }
}
