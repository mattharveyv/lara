<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'welcome']);
Route::get('/home', [PageController::class, 'welcome']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);

Route::post('/cart/add', [PageController::class, 'addToCart']);
Route::get('/cart', [PageController::class, 'cart']);
Route::post('/checkout', [PageController::class, 'checkout']);
Route::get('/orders', [PageController::class, 'orders']);
Route::get('/receipt/{id?}', [PageController::class, 'receipt'])->name('receipt');
