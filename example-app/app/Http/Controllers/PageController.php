<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::with('category')->latest()->take(6)->get();
        return view('home', compact('products'));
    }

    public function products()
    {
        return view('products');
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }
}
