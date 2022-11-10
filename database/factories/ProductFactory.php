<?php

namespace Database\Factories;

use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition($name = null, $type_id = 1)
    {
        return [
            // 'name' => $this->faker->word(2),
             'name' => $name,
            'description' => $this->faker->sentence(),
            'type_id' => $type_id,
        ];
    } 
}
