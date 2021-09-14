<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(), //Lucy Arsova
            'cost' => random_int(100,100000), //42000
            'price' => random_int(500,200000), //35000
            'quantity' => random_int(1,50), //6
            'brand_id' => random_int(1,10)
        ];
    }
}
