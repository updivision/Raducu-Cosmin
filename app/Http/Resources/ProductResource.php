<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'type' => $this->type,
            'name' => $this->name,
            'price' => $this->price,
            'attributes' => $this->getAttributesByType(),
            'links' => [
                'self' => url("/api/v1/products/{$this->id}")
            ]
        ];
    }

    /**
     * Helper method to return type-specific attributes.
     *
     * @return array
     */
    protected function getAttributesByType()
    {
        return match ($this->type) {
            'FASHION' => [
                'size' => $this->size,
                'gallery' => $this->gallery,
                'brand' => $this->brand ?? 'N/A',
                'discount' => $this->discount ?? 'None',
                'quantity' => $this->quantity ?? 'Unavailable'
            ],
            'BOOK' => [
                'author' => $this->author,
                'image' => $this->image,
                'excerpt' => $this->excerpt ?? 'No excerpt available',
                'publisher' => $this->publisher ?? 'Not specified',
                'quantity' => $this->quantity ?? 'Unavailable'
            ],
            'MUSIC' => [
                'artist' => $this->artist,
                'media' => $this->media ?? 'Not specified',
                'image' => $this->image ?? 'No cover available',
                'discount' => $this->discount ?? 'None',
                'quantity' => $this->quantity ?? 'Unavailable'
            ],
            default => [],
        };
    }

}
