<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MissingProducts>
 */
class MissingProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'active' => true,
            'reported' => true,
            'quantity' => $this->faker->numberBetween(0,2),
            /* 'user_id' => $this->faker->numberBetween(1, 10),
            'product_id' =>$this->faker->numberBetween(1, 10), */
        ];
    }
}
