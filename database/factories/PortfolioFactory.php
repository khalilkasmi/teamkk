<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Portfolio;
use Faker\Generator as Faker;

$factory->define(Portfolio::class, function (Faker $faker) {
    return [
        'title' =>$faker->text(255),
        'description' =>$faker->text(355),
        'user_id' =>$faker->numberBetween(1,100)
    ];
});
