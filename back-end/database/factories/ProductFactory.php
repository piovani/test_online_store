<?php

use Faker\Generator as Faker;
use App\Domain\Category\Category;

$factory->define(App\Domain\Product\Product::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->name,
        'sub_name' => $faker->name,
        'price' => $faker->randomFloat(2, 0, 10000),
        'category_id' => $category_id ?? Category::inRandomOrder()->first()->id,
    ];
});
