<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(4)
            ->create();

        Product::factory()
            ->count(20)
            ->create();

        Transaction::factory()
            ->count(10)
            ->create();
    }
}
