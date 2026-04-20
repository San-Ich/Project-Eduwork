<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electronics = \App\Models\ProductCategory::where('name', 'Electronics')->first();
        $fashion = \App\Models\ProductCategory::where('name', 'Fashion')->first();
        $home = \App\Models\ProductCategory::where('name', 'Home')->first();

        \App\Models\Product::create([
            'name' => 'Laptop ASUS',
            'description' => 'Laptop untuk coding',
            'stock' => 10,
            'image' => 'laptop.jpg',
            'category_id' => $electronics->id
        ]);

        \App\Models\Product::create([
            'name' => 'Sepatu Nike',
            'description' => 'Sepatu olahraga',
            'stock' => 20,
            'image' => 'sepatu.jpg',
            'category_id' => $fashion->id
        ]);

        \App\Models\Product::create([
            'name' => 'Meja Kayu',
            'description' => 'Meja minimalis',
            'stock' => 5,
            'image' => 'meja.jpg',
            'category_id' => $home->id
        ]);
    }
}