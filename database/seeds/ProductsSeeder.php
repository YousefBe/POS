<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'name' => 'Samsung LCD',
            'description' => 'Screen gamda F4a5ola',
            'selling_price' => 3000,
            'purchase_price' => 2500,
            'stock' => 3,
            'category_id' => 1,
        ]);
        $product = Product::create([
            'name' => 'Iphone X',
            'description' => 'IPhone 8aly 3ala el fady',
            'selling_price' => 7000,
            'purchase_price' => 5500,
            'stock' => 3,
            'category_id' => 2,
        ]);
        $product = Product::create([
            'name' => 'Oppo F5',
            'description' => 'Phone seny 7aker',
            'selling_price' => 3000,
            'purchase_price' => 2500,
            'stock' => 3,
            'category_id' => 2,
        ]);
        $product = Product::create([
            'name' => 'PS 5',
            'description' => 'Sell your lung',
            'selling_price' => 30000,
            'purchase_price' => 15000,
            'stock' => 3,
            'category_id' => 3,
        ]);
    }
}