<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AirPort>
 */
class AirPortFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name() , 
            'country' => fake()->country() , 
            'state' => fake()->streetName() , 
            'city' => fake()->city()
        ];
    }
}
