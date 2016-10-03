<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'verified' => 1,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\News::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'title' => $faker->text(20),
        'user_id' => 1,
        'summary' => $faker->paragraph,
        'content' => $faker->paragraph(10),
        'publish' => 1
    ];
});
