<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;
use App\User;

$factory->define(Review::class, function (Faker $faker) {
	$users = User::all()->pluck('id')->toArray();
    return [
        'reviewer_id' => $faker->randomElement($users),
        'reviewee_id' => $faker->randomElement($users),
        'review' => $faker->sentence,
        'rating' => $faker->numberBetween($min = 1 , $max = 5),
    ];
});
