<?php

use Faker\Generator as Faker;

$factory->define(App\Domain\Category\Category::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'description' => $faker->text,
    ];
});
