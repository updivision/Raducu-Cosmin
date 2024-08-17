<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'name', 'size', 'brand', 'gallery', 'author',
        'image', 'excerpt', 'publisher', 'artist', 'media',
        'price', 'discount', 'quantity',
    ];

    protected $casts = [
        'gallery' => 'array',
        'discount' => 'float',
        'price' => 'float',
    ];

    /**
     * Get the product's type.
     *
     * @return string
     */
    public function getTypeAttribute()
    {
        return $this->attributes['type'];
    }

    /**
     * Get the specific product instance (polymorphic relation).
     */
    public function productable()
    {
        return $this->morphTo();
    }
}
