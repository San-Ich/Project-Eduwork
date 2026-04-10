<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah produk
        $totalProducts = Product::count();

        // Hitung jumlah kategori
        $totalCategories = ProductCategory::count();

        // Hitung total klik produk
        $totalClicks = Product::sum('clicks') ?? 0;

        return view('dashboard', [
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'totalClicks' => $totalClicks,
        ]);
    }
}
