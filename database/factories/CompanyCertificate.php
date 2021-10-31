<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CompanyCertificate;
use App\User;
use Faker\Generator as Faker;

$factory->define(CompanyCertificate::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'title' => $faker->text
    ];
});
