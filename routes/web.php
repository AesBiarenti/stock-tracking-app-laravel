<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/go-register', function () {
    return view('register');
})->name('go-register');
Route::get('/category', function () {
    return view('stock.add-category');
})->name('add-category');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/register',[UserController::class,'register'])->name('register');
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
});


