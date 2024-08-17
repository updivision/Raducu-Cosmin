<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FashionProduct>
 */
class FashionProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            'gallery' => [
                $this->faker->imageUrl(300, 300),
                $this->faker->imageUrl(300, 300),
            ],
            'brand' => $this->faker->word(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'discount' => $this->faker->randomFloat(2, 0, 1),
        ];
    }

    public function fashion()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'FASHION',
                'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
                'brand' => $this->faker->word(),
                'gallery' => [
                    $this->faker->imageUrl(300, 300),
                    $this->faker->imageUrl(300, 300),
                ],
            ];
        });
    }
}
