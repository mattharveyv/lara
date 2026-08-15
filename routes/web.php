<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'welcome']);
Route::get('/home', [PageController::class, 'welcome']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/products/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit']);
Route::patch('/products/{product}', [App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/products/{product}', [App\Http\Controllers\ProductController::class, 'destroy']);

Route::post('/cart/add', [PageController::class, 'addToCart']);
Route::get('/cart', [PageController::class, 'cart']);
Route::post('/checkout', [PageController::class, 'checkout']);
Route::get('/orders', [PageController::class, 'orders']);
Route::get('/receipt/{id?}', [PageController::class, 'receipt'])->name('receipt');
