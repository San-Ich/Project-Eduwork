<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ProductCategory::firstOrCreate(['name' => 'Electronics']);
        \App\Models\ProductCategory::firstOrCreate(['name' => 'Fashion']);
        \App\Models\ProductCategory::firstOrCreate(['name' => 'Home']);
    }
}