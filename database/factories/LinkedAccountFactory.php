<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LinkedAccount;
use Faker\Generator as Faker;

$factory->define(LinkedAccount::class, function (Faker $faker) {
    return [
        'user_id' =>  $faker->numberBetween(1,100),
        'provider_name' => $faker->randomElement(['facebook','google'])
    ];
});
