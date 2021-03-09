<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Kaos Oblong',
            'desc' => 'Lorem ipsum sol dolor ahmed',
            'price' => 75000,
            'stock' => 10,
            'image' => 'a.jpg',
            'id_size' => 3,
            'id_category' => 1,
        ]);
        Product::create([
            'name' => 'Kaos Oblong',
            'desc' => 'Lorem ipsum sol dolor ahmed',
            'price' => 100000,
            'stock' => 10,
            'image' => 'a.jpg',
            'id_size' => 5,
            'id_category' => 1,
        ]);
        Product::create([
            'name' => 'Kaos Oblong',
            'desc' => 'Lorem ipsum sol dolor ahmed',
            'price' => 80000,
            'stock' => 10,
            'image' => 'a.jpg',
            'id_size' => 4,
            'id_category' => 1,
        ]);
    }
}
