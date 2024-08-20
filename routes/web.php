<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Default Route
Route::get('/', [\App\Http\Controllers\LoginController::class, 'index']);

//Login Route
Route::get('login', [\App\Http\Controllers\LoginController::class, 'index']);
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionLogin'])->name('action-login');

//Dashboard Route
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);

//user Route
Route::resource('user', \App\Http\Controllers\UserController::class);
