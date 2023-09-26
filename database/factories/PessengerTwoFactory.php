<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PessengerTwo>
 */
class PessengerTwoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'FirstName' => fake()->firstName(), 
            'LastName' => fake()->lastName(), 
            'DOB' => fake()->date(), 
            'CitizenshipCountry' => fake()->city(), 
            'ResidenceCountry' => fake()->city(), 
            'PassportNumber' => fake()->randomDigit(100000,999999) 
        ];
    }
}
