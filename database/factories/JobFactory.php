<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'title' => $faker->text(100),
        'description' => $faker->text(355),
        'ville' => $faker->city,
        'price' => $faker->randomFloat(),
        'user_id' => $faker->numberBetween(1,100),
        'sub_cat_id' => $faker->numberBetween(1,25)
    ];
});
