<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

 

$factory->define(Products::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'due_date'=>$faker->dateTime,
        'amount' => $faker->randomDigit,
        'price' => $faker->numberBetween(100000,1000000)
    ];
});
