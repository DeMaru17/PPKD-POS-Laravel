<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });
// Default Route
Route::get('/', [\App\Http\Controllers\LoginController::class, 'index']);

//Login Route
Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');

Route::get('keluar', function () {
    Auth::logout();
    return redirect()->to('login');
})->name('keluar');

Route::middleware(['checkLevel:3'])->group(function () {
    Route::resource('penjualan', \App\Http\Controllers\TransactionController::class);
});



//Dashboard Route
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class)->middleware(['auth']);

//user Route
Route::resource('user', \App\Http\Controllers\UserController::class);

// category route
Route::resource('category', \App\Http\Controllers\CategoryController::class);

// product route
Route::resource('product', \App\Http\Controllers\ProductController::class);

// transaction route

// get product category route
Route::get('get-products/{category_id}',  [\App\Http\Controllers\TransactionController::class, 'getProducts']);

// get product name route
Route::get('get-product-name/{product_id}',  [\App\Http\Controllers\TransactionController::class, 'productName']);

// penjualan print route
Route::get('print/{id}',  [\App\Http\Controllers\TransactionController::class, 'print']);
