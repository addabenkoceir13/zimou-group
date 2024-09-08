<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'user_id' => 2,
            'name' => 'T-shirt',
            'reference' => 'Shirt',
            'buying_price' => 1200,
            'selling_price' => 2400,
            'image' => 'images\1725812912.png',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat laudantium vel minus necessitatibus rem deserunt, soluta enim?',
        ]);

        Product::create([
            'user_id' => 2,
            'name' => 'Sweater',
            'reference' => 'Sweater',
            'buying_price' => 2200,
            'selling_price' => 3400,
            'image' => 'images\1725812912.png',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat laudantium vel minus necessitatibus rem deserunt, soluta enim?',
        ]);

        Product::create([
            'user_id' => 2,
            'name' => 'Coat',
            'reference' => 'Coat',
            'buying_price' => 2200,
            'selling_price' => 3400,
            'image' => 'images\1725812912.png',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat laudantium vel minus necessitatibus rem deserunt, soluta enim?',
        ]);
    }
}
