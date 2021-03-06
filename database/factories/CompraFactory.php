<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cantidad' => rand(1,10),
            'user_id' => rand(1,5),
            'producto_id' => rand(1,5)
        ];
    }
}
