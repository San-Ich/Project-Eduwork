<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    // relasi ke produk
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}