<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
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

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'first_name' => Str::random(10),
        'last_name' => Str::random(10),
        'email' => $faker->unique()->safeEmail,
        'job_title' => Str::random(10),
        'city' => Str::random(10),
        'country' => Str::random(10),
    ];
});
