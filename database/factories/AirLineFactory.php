<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AirLine>
 */
class AirLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->word(2), 
            'name' => fake()->name() , 
            'country' => fake()->country() , 
            'description' => fake()->sentence(2)
        ];
    }
}
