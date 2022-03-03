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
            "name" => $this->faker->name,
            "gender" => $this->faker->randomElement(["Male", "Female"]),
            "age" => $this->faker->numberBetween(5,15),
            "species" => $this->faker->randomElement(["Cat", "Dog"]),
            "breed" => $this->faker->text(10),
            "status" => $this->faker->randomElement(["Ready", "Not Ready"]),
        ];
    }
}
