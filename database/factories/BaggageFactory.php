<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Baggage>
 */
class BaggageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'WeightKG' => fake()->randomFloat() , 
            'BaggageNumber' => fake()->randomFloat(), 
            'bookings_id' => fake()->randomDigitNotZero(1,100)
        ];
    }
}
