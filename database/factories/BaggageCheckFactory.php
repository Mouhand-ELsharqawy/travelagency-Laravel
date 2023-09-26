<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BaggageCheck>
 */
class BaggageCheckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'CheckResult' => fake()->word() , 
            'bookings_id' => fake()->randomDigitNotZero(1,100), 
            'pessenger_ones_id' => fake()->randomDigitNotZero(1,100)
        ];
    }
}
