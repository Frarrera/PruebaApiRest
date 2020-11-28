<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => implode(' ', $this->faker->words(3)),
            'description' => implode(' ', $this->faker->words(6)),
            'quantity' => $this->faker->randomNumber(2),
            'user_id' => User::all()->take(3)[random_int(0, 2)]->id,
        ];
    }
}
