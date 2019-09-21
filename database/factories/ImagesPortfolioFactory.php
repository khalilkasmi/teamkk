<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ImagesPortfolio;
use Faker\Generator as Faker;

$factory->define(ImagesPortfolio::class, function (Faker $faker) {
    return [
        'portfolio_id' => $faker->numberBetween(1,50),
        'image_link' => 'https://source.unsplash.com/random'
    ];
});
