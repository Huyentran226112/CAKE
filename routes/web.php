<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProductController;
use  App\Http\Controllers\OrderController;
use  App\Http\Controllers\OrderDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.include. content');
// });
Route::resource('categories', CategoryController::class);

// route products
Route::group(['prefix'=>'products'],function(){
    Route::get('/trash',[ProductController::class,'trash'])->name('products.trash');
    Route::get('/restore/{id}',[ProductController::class,'restore'])->name('products.restore');
    Route::get('/deleteforever/{id}',[ProductController::class,'deleteforever'])->name('products.deleteforever');
});
Route::resource('products',ProductController::class);

// route orders
Route::group(['prefix'=>'orders'],function(){
    Route::get('/trash',[OrderController::class,'trash'])->name('orders.trash');
    Route::get('/restore/{id}',[OrderController::class,'restore'])->name('orders.restore');
    Route::get('/deleteforever/{id}',[OrderController::class,'deleteforever'])->name('orders.deleteforever');
});
Route::resource('orders',OrderController::class);

Route::group(['prefix'=>'orderdetail'],function(){
    Route::get('/trash',[OrderDetailController::class,'trash'])->name('orderdetail.trash');
    Route::get('/restore/{id}',[OrderDetailController::class,'restore'])->name('orderdetail.restore');
    Route::get('/deleteforever/{id}',[OrderDetailController::class,'deleteforever'])->name('orderdetail.deleteforever');
});
Route::resource('orderdetail',OrderDetailController::class);