<?php
use App\Todo;
use App\User;
use Faker\Generator;
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
$factory->define(User::class, function (Generator $faker) 
{
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(Todo::class, function (Generator $faker) 
{
    return [
        'title' => $faker->sentence(),
        'description'  => $faker->text(),
        'reference'  => $faker->name,
        'priority'  => $faker->numberBetween(1, 10),
        'category'  => $faker->name,
    ];
});