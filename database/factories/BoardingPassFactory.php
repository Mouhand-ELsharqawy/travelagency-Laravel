<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoardingPass>
 */
class BoardingPassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'QRCode' => fake()->word(4,4), 
            'bookings_id' => fake()->randomDigitNotZero(1,100)
        ];
    }
}
