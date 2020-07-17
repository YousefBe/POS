<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name' => 'TV Screens'
        ]);
        $category = Category::create([
            'name' => 'Mobile Phones'
        ]);
        $category = Category::create([
            'name' => 'Gaming Platforms'
        ]);
    }
}