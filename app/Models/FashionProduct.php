<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FashionProduct extends Product
{
    use HasFactory;

    protected $table = 'products';

    protected $attributes = [
        'type' => 'FASHION',
    ];

    protected $fillable = [
        'size',
        'gallery',
        'brand',
        'discount',
        'quantity',
    ];

    protected $casts = [
        'discount' => 'float',
        'quantity' => 'integer',
    ];

    public function product()
    {
        return $this->morphOne(Product::class, 'productable');
    }
}