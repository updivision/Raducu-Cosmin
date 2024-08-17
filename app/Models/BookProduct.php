<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookProduct extends Product
{
    use HasFactory;
    
    protected $table = 'products';

    protected $attributes = [
        'type' => 'BOOK',
    ];

    protected $fillable = [
        'author',
        'image',
        'excerpt',
        'publisher',
        'quantity',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function product()
    {
        return $this->morphOne(Product::class, 'productable');
    }
}