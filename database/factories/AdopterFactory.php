<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdopterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['Male', 'Female']);

        return [
            'name' => $this->faker->name($gender),
            'gender' => $gender,
            'age' => $this->faker->numberBetween(18, 55),
            'address' => $this->faker->address,
        ];
    }
}
