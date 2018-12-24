<?php

use Illuminate\Database\Seeder;
use App\Domain\Product\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Domain\Category\Category::all();

        foreach ($categories as $category) {
            factory(Product::class, 5)->create([
                'category_id' => $category->id
            ]);
        }
    }
}
