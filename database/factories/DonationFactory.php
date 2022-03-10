<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(["Cash", "Items"]),
            'description' => $this->faker->text(10),
            'quantity' => $this->faker->randomNumber(1, 100),
        ];
    }
}
