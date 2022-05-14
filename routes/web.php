<?php

use App\Http\Controllers\Admin\AdminCartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\HomeCategoryController;
use App\Http\Controllers\Home\ProductController;
use App\Http\Controllers\Home\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', [AdminController::class, 'loginAdmin'])->name('login');
Route::get('/admin/logout', [AdminController::class, 'logOutAdmin']);
Route::post('/admin', [AdminController::class, 'postLoginAdmin']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('admin.home');
    });
    Route::prefix('admin')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');            
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');            
            Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');           
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');          
            Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
            Route::get('/search-category', [CategoryController::class, 'search'])->name('category.search');
        });
    
        Route::prefix('product')->group(function () {          
            Route::get('/', [AdminProductController::class, 'index'])->name('product.index');         
            Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');            
            Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');            
            Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit');           
            Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('product.update');          
            Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('product.delete');
            Route::get('/search-product', [AdminProductController::class, 'search'])->name('product.search');
        });
    
        //slider
        Route::prefix('slider')->group(function () {          
            Route::get('/', [AdminSliderController::class, 'index'])->name('slider.index');           
            Route::get('/create', [AdminSliderController::class, 'create'])->name('slider.create');           
            Route::post('/store', [AdminSliderController::class, 'store'])->name('slider.store');            
            Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])->name('slider.edit');           
            Route::post('/update/{id}', [AdminSliderController::class, 'update'])->name('slider.update');     
            Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])->name('slider.delete');
        });
    
        Route::prefix('customers')->group(function () {
            Route::get('/', [AdminCartController::class, 'index'])->name('customers.index');
            Route::get('/active/{id}', [AdminCartController::class, 'active'])->name('customers.active');
            Route::get('/delete/{id}', [AdminCartController::class, 'delete'])->name('customers.delete');
        });
        Route::prefix('customers')->group(function () {
            Route::get('/view/{customer}', [AdminCartController::class, 'show']);
        });
    });
});


Route::get('/index', [HomeController::class, 'index']);
Route::get('/category/{slug}/{id}', [HomeCategoryController::class, 'index'])->name('category.product');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('product.detail');

Route::post('/add-cart', [CartController::class, 'index']);
Route::get('/carts', [CartController::class, 'show']);
Route::post('/update-cart', [CartController::class, 'update']);
Route::get('/carts/delete/{id}', [CartController::class, 'delete']);
Route::post('/carts', [CartController::class, 'addCart']);

Route::get('/search', [ProductController::class, 'search']);

//email
Route::get('/email-test', [HomeController::class, 'email']);
