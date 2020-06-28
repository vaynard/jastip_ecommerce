<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use App\User;
use App\Destination;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {

	$users = User::all()->pluck('id')->toArray();
	$destinations = Destination::all()->pluck('id')->toArray();
	$category = Category::all()->pluck('id')->toArray();

    return [
        'product_name' => $faker->word,
        'product_price' => $faker->randomNumber(5),
        'description' => $faker->sentence,
        'arrival_date' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'capacity' => 0,
        'total_capacity' => $faker->numberBetween($min = 1 , $max = 15),
        'user_id' => $faker->randomElement($users),
        'destination_id' => $faker->randomElement($destinations),
        'category_id' => $faker->randomElement($category),
        'product_image' => 'food2.jpg',
    ];
});
