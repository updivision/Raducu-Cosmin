<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicProduct extends Product
{
    use HasFactory;

    protected $table = 'products';

    protected $attributes = [
        'type' => 'MUSIC',
    ];

    protected $fillable = [
        'artist',
        'media',
        'image',
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