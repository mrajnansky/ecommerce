<?php

namespace Database\Factories\ProductModule;

use App\Models\ProductModule\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(10),
            'name' => $this->faker->name(),
            'stock' => $this->faker->randomDigitNotNull(),
            'price' => $this->faker->randomFloat(2),
            'description' => $this->faker->text(),
            'show' => $this->faker->boolean()
        ];
    }
}
