<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'description' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'price' => $this->faker->randomFloat(
                $nbMaxDecimals = 2, 
                $min = 0, 
                $max = 1000
              ),
            'approved' => false,
        ];
    }
}
