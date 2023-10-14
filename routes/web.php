<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect',[\App\Http\Controllers\HomeController::class,'redirect']);
// Route::get('/admin',[\App\Http\Controllers\HomeController::class,'adminDashboard']);
//Category
Route::get('/view_category',[\App\Http\Controllers\Admin\CategoryController::class,'viewCategory']);
Route::post('/add_category',[\App\Http\Controllers\Admin\CategoryController::class,'addCategory']);
Route::delete('/delete_category/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'deleteCategory']);
//Product
Route::get('/create_product',[\App\Http\Controllers\Admin\ProductController::class,'create'])->name('createProduct');
Route::post('/store_product',[\App\Http\Controllers\Admin\ProductController::class,'store'])->name('storeProduct');
Route::get('/show_product',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('showProduct');
Route::get('/edit_product/{id}',[\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('editProduct');
Route::post('/update_product/{id}',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('updateProduct');
Route::delete('/delete_product/{id}',[\App\Http\Controllers\Admin\ProductController::class,'delete'])->name('deleteProduct');
Route::get('/product_detail/{id}',[\App\Http\Controllers\HomeController::class,'productDetail'])->name('productDetail');
Route::post('/add_cart/{id}',[\App\Http\Controllers\HomeController::class,'addCart'])->name('addCart');
Route::get('/show_cart',[\App\Http\Controllers\HomeController::class,'showCart'])->name('showCart');
Route::delete('/delete_cart/{id}',[\App\Http\Controllers\HomeController::class,'deleteCart'])->name('deleteCart');
Route::get('/cash_order',[\App\Http\Controllers\HomeController::class,'cashOrder'])->name('cashOrder');