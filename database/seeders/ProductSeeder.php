<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\FashionProduct;
use App\Models\BookProduct;
use App\Models\MusicProduct;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fashion products
        FashionProduct::factory()->count(10)->create();

        // Music products
        MusicProduct::factory()->count(10)->create();

        // Book products
        BookProduct::factory()->count(10)->create();
    }
}
