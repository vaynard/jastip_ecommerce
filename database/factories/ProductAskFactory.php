<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductAsk;
use Faker\Generator as Faker;
use App\Product;
use App\User;

$factory->define(ProductAsk::class, function (Faker $faker) {
	$users = User::all()->pluck('id')->toArray();
	$products = Product::all()->pluck('id')->toArray();

    return [
        'user_id' => $faker->randomElement($users),
        'product_id' => $faker->randomElement($products),
        'content' => $faker->sentence,
    ];
});
