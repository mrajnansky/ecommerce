<?php

namespace Database\Factories\ProductModule;

use App\Models\ProductModule\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

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
        ];
    }
}
