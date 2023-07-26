<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProductController;

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

