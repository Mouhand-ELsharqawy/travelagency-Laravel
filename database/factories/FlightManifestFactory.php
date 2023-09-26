<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlightManifest>
 */
class FlightManifestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bookings_id' => fake()->randomDigitNotZero(1,100), 
            'flights_id' => fake()->randomDigitNotZero(1,100)
        ];
    }
}
