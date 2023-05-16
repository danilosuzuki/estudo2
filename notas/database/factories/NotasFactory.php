<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotasFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'message' => $this->faker->words(20, true),
        ];
    }
}
