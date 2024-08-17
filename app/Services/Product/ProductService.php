<?php

namespace App\Services\Product;

use App\Services\Product\Contracts\ProductInterface;
use App\Models\{BookProduct, FashionProduct, MusicProduct};
use Illuminate\Support\Collection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;


class ProductService implements ProductInterface
{
    /**
     * Retrieve paginated products from the database based on a specified quantity.
     *
     * @param int $quantity The number of products to display per page.
     * @return LengthAwarePaginator
     */
    public function getPaginatedProducts(int $quantity): LengthAwarePaginator
    {
        // Fetch paginated products from the database
        return Product::paginate($quantity);
    }

    /**
     * Create a new product using the provided data.
     *
     * @param array $data
     * @return mixed
     */
    public function createProduct(array $data)
    {
        return Product::create($data);
    }


}
