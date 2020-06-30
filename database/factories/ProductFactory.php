<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //'name' => $faker->unique()->word,
        'name' => $faker->words(3, true),
        //'description' => $faker->sentence,
        'description' => $faker->realText(200),
        'price' => $faker->randomFloat(2, 10, 100),
        'image' => $faker->name(),
    ];
});
