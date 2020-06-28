<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductAskReply;
use Faker\Generator as Faker;
use App\ProductAsk;

$factory->define(ProductAskReply::class, function (Faker $faker) {
    return [
        'product_ask_id' => $faker->unique()->numberBetween(1, App\ProductAsk::count()),
        'content' => $faker->sentence,
    ];
});
