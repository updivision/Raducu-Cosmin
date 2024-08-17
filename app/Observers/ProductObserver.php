<?php

namespace App\Observers;

use App\Models\Product;
use App\Events\ProductCreated;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  Product  $product
     * @return void
     */
    public function created(Product $product): void
    {
        event(new ProductCreated($product));
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
