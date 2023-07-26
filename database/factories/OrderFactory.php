<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => fake()->numberBetween($min = 1, $max = 10),
            'date_ship' => fake()->date(),
            'note' => fake()->sentence(),
            'total' => 1000000,
            'created_at' => fake()->date(),
        ];
    }
}
