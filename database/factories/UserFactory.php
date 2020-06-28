<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
	$filePath = public_path('avatar');
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'is_admin' => false,
        'avatar' => 'avatar_placeholder.jpg',
        'gender' =>  (bool)random_int(0, 1),
        'city' => $faker->city,
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
        'line_id' => $faker->firstName,
        'twitter_id' => $faker->firstName,
        'instagram_id' => $faker->firstName,
    ];
});
