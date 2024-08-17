<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Services\Product\ProductNotificationService;


use App\Models\Product;

class ProductCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;

    /**
     * Create a new event instance.
     *
     * @param Product $product
     * @return void
     */
    public function __construct(Product $product, ProductNotificationService $notificationService)
    {
        $this->product = $product;
        $notificationService->notifyAndDispatch($this->product);
    }
}
