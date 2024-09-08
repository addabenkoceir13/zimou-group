<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductRefer;

class ProductReferenceSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductRefer::create([
            'product_id' => 1,
            'reference' => 'T-shorte-Red-S',
        ]);
        ProductRefer::create([
            'product_id' => 1,
            'reference' => 'T-shorte-Red-M',
        ]);
        ProductRefer::create([
            'product_id' => 1,
            'reference' => 'T-shorte-Blue-S',
        ]);
        ProductRefer::create([
            'product_id' => 1,
            'reference' => 'T-shorte-Blue-M',
        ]);
        ProductRefer::create([
            'product_id' => 2,
            'reference' => 'Sweater-Red-S',
        ]);
        ProductRefer::create([
            'product_id' => 2,
            'reference' => 'Sweater-Red-M',
        ]);
        ProductRefer::create([
            'product_id' => 2,
            'reference' => 'Sweater-Red-L',
        ]);
        ProductRefer::create([
            'product_id' => 2,
            'reference' => 'Sweater-Black-S',
        ]);
        ProductRefer::create([
            'product_id' => 2,
            'reference' => 'Sweater-Black-M',
        ]);
        ProductRefer::create([
            'product_id' => 2,
            'reference' => 'Sweater-Black-L',
        ]);
        ProductRefer::create([
            'product_id' => 2,
            'reference' => 'Sweater-Green-S',
        ]);
        ProductRefer::create([
            'product_id' => 2,
            'reference' => 'Sweater-Green-M',
        ]);
        ProductRefer::create([
            'product_id' => 2,
            'reference' => 'Sweater-Green-L',
        ]);
        ProductRefer::create([
            'product_id' => 3,
            'reference' => 'Coat-Red-L-Cotton',
        ]);
        ProductRefer::create([
            'product_id' => 3,
            'reference' => 'Coat-Red-XL-Cotton',
        ]);
        ProductRefer::create([
            'product_id' => 3,
            'reference' => 'Coat-Black-L-Cotton',
        ]);
        ProductRefer::create([
            'product_id' => 3,
            'reference' => 'Coat-Black-XL-Cotton',
        ]);
    }
}
