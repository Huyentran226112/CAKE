<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => fake()->imageUrl(640,480),
            'name' => fake()->name,
            'email' => fake()->email,
            'password' => bcrypt('123456'),
            'gender' =>  fake()->numberBetween($min = 0, $max = 2),
            'day_of_birth' => fake()->date(),
            'address' => fake()->address(),
            'phone' => fake()->phonenumber(),
            'branch' => fake()->word(),
            'group_id' => fake()->numberBetween($min = 1, $max = 3),
        ];
    }
}
