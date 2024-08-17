<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\FashionProduct;
use App\Models\BookProduct;
use App\Models\MusicProduct;


class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_paginated_products()
    {
        // Generate 10 fashion products, 10 books, and 10 music products
        FashionProduct::factory()->fashion()->count(10)->create();
        BookProduct::factory()->book()->count(10)->create();
        MusicProduct::factory()->music()->count(10)->create();

        // Call the API endpoint with a quantity of 15
        $response = $this->getJson('/api/v1/products?quantity=15');

        // Check the response status
        $response->assertStatus(200);

        // Retrieve the response data
        $products = $response->json('data');

        // Check the total number of items returned
        $this->assertEquals(15, count($products));

        // Check the structure of each product based on its type
        foreach ($products as $product) {
            $this->assertNotEmpty($product['type']);
            $this->assertNotEmpty($product['name']);
            $this->assertNotEmpty($product['price']);

            switch ($product['type']) {
                case 'FASHION':
                    $this->assertArrayHasKey('size', $product);
                    $this->assertArrayHasKey('brand', $product);
                    $this->assertArrayHasKey('gallery', $product);
                    break;
                case 'BOOK':
                    $this->assertArrayHasKey('author', $product);
                    $this->assertArrayHasKey('image', $product);
                    $this->assertArrayHasKey('publisher', $product);
                    break;
                case 'MUSIC':
                    $this->assertArrayHasKey('artist', $product);
                    $this->assertArrayHasKey('media', $product);
                    $this->assertArrayHasKey('image', $product);
                    break;
            }
        }

        // Check pagination meta data
        $response->assertJsonFragment([
            'current_page' => 1,
            'per_page' => 15,
            'total' => 30,  // Total of 30 products in the database
        ]);
    }


    /** @test */
    public function it_returns_empty_when_no_products_exist()
    {
        // Call the API endpoint without any products in the database
        $response = $this->getJson('/api/v1/products?quantity=10');

        // Check the response status
        $response->assertStatus(200);

        // Check that the data array is empty
        $response->assertJsonFragment([
            'data' => [],
        ]);
    }
}
