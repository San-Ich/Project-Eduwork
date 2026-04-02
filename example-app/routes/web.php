<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/cart', [PageController::class, 'cart']);
Route::get('/checkout', [PageController::class, 'checkout']);

// halaman
Route::get('/', [PageController::class, 'home']);
Route::get('/products', [PageController::class, 'products']);
Route::get('/cart', [PageController::class, 'cart']);
Route::get('/checkout', [PageController::class, 'checkout']);

// produk (CRUD dasar)
Route::get('/produk', [ProductController::class, 'index']);
Route::get('/produk/create', [ProductController::class, 'create']);
Route::post('/produk/store', [ProductController::class, 'store']);
Route::get('/produk/{id}', [ProductController::class, 'show']);
Route::get('/produk/edit/{id}', [ProductController::class, 'edit']);
Route::post('/produk/update/{id}', [ProductController::class, 'update']);
Route::get('/produk/delete/{id}', [ProductController::class, 'destroy']);