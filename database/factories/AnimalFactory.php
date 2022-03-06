<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->firstName,
            "gender" => $this->faker->randomElement(["Male", "Female"]),
            "age" => $this->faker->numberBetween(5, 15),
            "species" => $this->faker->randomElement(["Cat", "Dog"]),
            "breed" => $this->faker->lastname,
            "for_adoption" => $this->faker->boolean(),
        ];
    }
}
