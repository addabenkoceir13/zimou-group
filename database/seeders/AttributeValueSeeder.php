<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttributeValue;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttributeValue::create([
            'attribute_id' => 1,
            'name' => 'Red',
        ]);
        AttributeValue::create([
            'attribute_id' => 1,
            'name' => 'Black',
        ]);
        AttributeValue::create([
            'attribute_id' => 1,
            'name' => 'Green',
        ]);
        AttributeValue::create([
            'attribute_id' => 1,
            'name' => 'Blue',
        ]);
        AttributeValue::create([
            'attribute_id' => 2,
            'name' => 'S',
        ]);
        AttributeValue::create([
            'attribute_id' => 2,
            'name' => 'M',
        ]);
        AttributeValue::create([
            'attribute_id' => 2,
            'name' => 'L',
        ]);
        AttributeValue::create([
            'attribute_id' => 2,
            'name' => 'XL',
        ]);
        AttributeValue::create([
            'attribute_id' => 3,
            'name' => 'Cotton',
        ]);
    }
}
