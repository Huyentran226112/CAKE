<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'day_of_birth' => fake()->date(),
            'address' => fake()->address(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique->phonenumber(),
            'gender' => fake()->numberBetween($min = 0, $max = 2),
            'password' => bcrypt('123456'),
            'created_at' => fake()->date(),
        ];
    }
}
