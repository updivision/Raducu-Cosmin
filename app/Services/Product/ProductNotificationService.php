<?php 

namespace App\Services\Product;

use App\Models\Product;
use App\Notifications\ProductCreatedNotification;
use App\Jobs\UpdateInventoryAfterProductCreation;

class ProductNotificationService
{
    /**
     * Notify and dispatch the product creation.
     *
     * @param Product $product
     * @return void
     */
    public function notifyAndDispatch(Product $product)
    {
        $product->notify(new ProductCreatedNotification($product));
        UpdateInventoryAfterProductCreation::dispatch($product);
    }
}
