<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Destination;
use Faker\Generator as Faker;

$factory->define(App\Destination::class, function (Faker $faker) {
    return [
        'destination_name' => $faker->city,
        'is_active' => true,
    ];
});
