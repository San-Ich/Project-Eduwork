<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;

// Halaman umum
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');

// Produk (with ProductController)
Route::resource('products', ProductController::class);