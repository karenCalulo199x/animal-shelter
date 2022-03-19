<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HealthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(["Injury", "Disease"]),
            'description' => $this->faker->text(10),
        ];
    }
}
