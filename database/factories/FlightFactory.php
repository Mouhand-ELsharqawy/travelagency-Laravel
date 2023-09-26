<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'DepartGate' => fake()->city(), 
            'ArriveGate' => fake()->city(), 
            'air_lines_id' => fake()->randomDigitNotZero(1,100), 
            'air_ports_id' => fake()-> randomDigitNotZero(1,100)
        ];
    }
}
