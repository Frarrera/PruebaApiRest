<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $products = Product::all();
        $product = $products[random_int(0, 19)];

        return [
            'quantity' =>  random_int(1, 20) > $product->quantity ? 1 : random_int(1, 20),
            'product_id' => $product->id,
            'user_id' => User::all()[random_int(0, 3)]->id,
        ];
    }
}
