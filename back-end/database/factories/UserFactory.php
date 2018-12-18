<?php

use Faker\Generator as Faker;


$factory->define(\App\Domain\User\User::class, function (Faker $faker) {
    static $password;

    return [
        'id' => $faker->uuid(),
        'email' => $faker->email(),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
