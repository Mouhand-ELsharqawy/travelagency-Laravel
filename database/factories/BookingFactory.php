<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pessenger_twos_id' => fake()->randomDigitNotZero(1,100) , 
            'FlightDate' => fake()->date(), 
            'status' => fake()->randomElement(['active']), 
            'BookingClass' => fake()->randomElement(['A','B','C']), 
            'SeatNumber' => fake()->word(1) . fake()->randomDigit(1,100), 
            'BookingPaltform' => fake()->word()
        ];
    }
}
