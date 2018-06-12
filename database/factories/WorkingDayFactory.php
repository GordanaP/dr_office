<?php

use Faker\Generator as Faker;

$factory->define(App\WorkingDay::class, function (Faker $faker) {
    return [
        'name' => $faker->dayOfWeek,
        'index' => $faker->randomDigit
    ];
});
