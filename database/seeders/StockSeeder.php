<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::create([
            'stock' => 20,
            'price' => 70000,
            'id_size' => 3,
            'id_product' => 1,
        ]);
        Stock::create([
            'stock' => 20,
            'price' => 75000,
            'id_size' => 4,
            'id_product' => 1,
        ]);
        Stock::create([
            'stock' => 20,
            'price' => 70000,
            'id_size' => 3,
            'id_product' => 2,
        ]);
        Stock::create([
            'stock' => 20,
            'price' => 75000,
            'id_size' => 4,
            'id_product' => 2,
        ]);
        Stock::create([
            'stock' => 20,
            'price' => 70000,
            'id_size' => 3,
            'id_product' => 3,
        ]);
        Stock::create([
            'stock' => 20,
            'price' => 75000,
            'id_size' => 4,
            'id_product' => 3,
        ]);
    }
}
