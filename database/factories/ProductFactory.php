<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->imageUrl(640, 480),
            'name' => fake()->name,
            'category_id' => fake()->numberBetween($min = 1, $max = 10),
            'quantity' => fake()->numberBetween($min = 1, $max = 10),
            'price' => fake()->numberBetween($min = 1000000, $max = 10000000),
            'discount' => fake()->numberBetween($min = 10, $max = 20),
            'selled' => '0'
        ];
    }
}