<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookProduct>
 */
class BookProductFactory extends Factory
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
            'author' => $this->faker->name(),
            'image' => $this->faker->imageUrl(300, 400),
            'excerpt' => $this->faker->text(200),
            'publisher' => $this->faker->words(3, true),
            'quantity' => $this->faker->numberBetween(1, 100),
            'discount' => $this->faker->randomFloat(2, 0, 1),
        ];
    }

    public function book()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'BOOK',
                'author' => $this->faker->name(),
                'image' => $this->faker->imageUrl(300, 300),
                'publisher' => $this->faker->company(),
            ];
        });
    }
}
