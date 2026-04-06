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
        DB::table('products')->insert([
            [
                'name' => 'Laptop ASUS',
                'description' => 'Laptop untuk coding',
                'stock' => 10,
                'image' => 'laptop.jpg',
                'category_id' => 1
            ],
            [
                'name' => 'Sepatu Nike',
                'description' => 'Sepatu olahraga',
                'stock' => 20,
                'image' => 'sepatu.jpg',
                'category_id' => 2
            ],
            [
                'name' => 'Meja Kayu',
                'description' => 'Meja minimalis',
                'stock' => 5,
                'image' => 'meja.jpg',
                'category_id' => 3
            ]
        ]);
    }
}