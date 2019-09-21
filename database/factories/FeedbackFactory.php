<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feedback;
use Faker\Generator as Faker;

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        'comment' => $faker->text(300),
        'rating' => $faker->numberBetween(1,5),
        'user_id' => $faker->numberBetween(1,100),
        'job_id' => $faker->numberBetween(1,200)

    ];
});
