<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MusicProduct>
 */
class MusicProductFactory extends Factory
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
            'artist' => $this->faker->name(),
            'media' => $this->faker->randomElement(['CD', 'DVD', 'Vinyl']),
            'image' => $this->faker->imageUrl(300, 300),
            'quantity' => $this->faker->numberBetween(1, 100),
            'discount' => $this->faker->randomFloat(2, 0, 1),
        ];
    }

    public function music()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'MUSIC',
                'artist' => $this->faker->name(),
                'media' => $this->faker->randomElement(['CD', 'DVD', 'Vinyl']),
            ];
        });
    }
}
