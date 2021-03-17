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
            'image' => 'a.jpg',
            'id_category' => 1,
        ]);
        Product::create([
            'name' => 'Kaos Polos',
            'desc' => 'Lorem ipsum sol dolor ahmed',
            'image' => 'a.jpg',
            'id_category' => 1,
        ]);
        Product::create([
            'name' => 'Kaos Kutungan',
            'desc' => 'Lorem ipsum sol dolor ahmed',
            'image' => 'a.jpg',
            'id_category' => 1,
        ]);
    }
}
