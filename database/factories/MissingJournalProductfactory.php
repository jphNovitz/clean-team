<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MissingProducts>
 */
class MissingJournalProductfactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' =>$this->faker->numberBetween(1, 10),
            'user_id' =>$this->faker->numberBetween(1, 10),
        ];
    }
}
