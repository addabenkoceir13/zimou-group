<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;
class ProductAttributeSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAttribute::create([
            'product_id' => 1,
            'attribute_id' => 1,
            'attribute_value_id' => 1,
        ]);
        ProductAttribute::create([
            'product_id' => 1,
            'attribute_id' => 1,
            'attribute_value_id' => 4,
        ]);
        ProductAttribute::create([
            'product_id' => 1,
            'attribute_id' => 2,
            'attribute_value_id' => 5,
        ]);
        ProductAttribute::create([
            'product_id' => 1,
            'attribute_id' => 2,
            'attribute_value_id' => 6,
        ]);

        ProductAttribute::create([
            'product_id' => 2,
            'attribute_id' => 1,
            'attribute_value_id' => 1,
        ]);
        ProductAttribute::create([
            'product_id' => 2,
            'attribute_id' => 1,
            'attribute_value_id' => 2,
        ]);
        ProductAttribute::create([
            'product_id' => 2,
            'attribute_id' => 1,
            'attribute_value_id' => 3,
        ]);
        ProductAttribute::create([
            'product_id' => 2,
            'attribute_id' => 2,
            'attribute_value_id' => 5,
        ]);
        ProductAttribute::create([
            'product_id' => 2,
            'attribute_id' => 2,
            'attribute_value_id' => 6,
        ]);
        ProductAttribute::create([
            'product_id' => 2,
            'attribute_id' => 2,
            'attribute_value_id' => 7,
        ]);

        ProductAttribute::create([
            'product_id' => 3,
            'attribute_id' => 1,
            'attribute_value_id' => 1,
        ]);
        ProductAttribute::create([
            'product_id' => 3,
            'attribute_id' => 1,
            'attribute_value_id' => 2,
        ]);
        ProductAttribute::create([
            'product_id' => 3,
            'attribute_id' => 2,
            'attribute_value_id' => 7,
        ]);
        ProductAttribute::create([
            'product_id' => 3,
            'attribute_id' => 2,
            'attribute_value_id' => 8,
        ]);
        ProductAttribute::create([
            'product_id' => 3,
            'attribute_id' => 3,
            'attribute_value_id' => 9,
        ]);
    }
}
