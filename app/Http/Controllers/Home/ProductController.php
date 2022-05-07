<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $categories = Category::where('parent_id', 0)->get();
        $product = Product::where('id', $request->id)->first();
        $product_similars = Product::where('category_id', $product->category_id)->paginate(8);
        $product_image = ProductImage::where('product_id', $request->id)->get();
        $url = $request->url();
        // show ra image chi tiết
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                $product->images()->create([
                    'image_name' => $dataProductImageDetail['file_name'],
                    'image_path' => $dataProductImageDetail['file_path']
                ]);
            }
        }
        return view('index.product.product_detail', compact('categories','product', 'product_image', 'product_similars', 'url'));
    }

    public function search(Request $request) {
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::where('name','like', '%'.$request->key.'%')->get();
        return view('index.search', compact('products', 'categories'));
    }

}
