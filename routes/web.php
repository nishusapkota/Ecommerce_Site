<?php

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
Route::get('/view_category',[\App\Http\Controllers\AdminController::class,'viewCategory']);
Route::post('/add_category',[\App\Http\Controllers\AdminController::class,'addCategory']);
Route::delete('/delete_category/{id}',[\App\Http\Controllers\AdminController::class,'deleteCategory']);
