<?php

namespace App\Services\Product\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface ProductInterface
{
    /**
     * Retrieve paginated products based on a specified quantity.
     *
     * @param int $quantity The number of products to generate and return per page.
     * @return LengthAwarePaginator
     */
    public function getPaginatedProducts(int $quantity): LengthAwarePaginator;

    /**
     * Create a new product using the provided data.
     *
     * @param array $data
     * @return mixed
     */
    public function createProduct(array $data);
}
