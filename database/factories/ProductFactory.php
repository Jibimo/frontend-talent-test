<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'price' => $faker->numberBetween(100000, 999999),
        'discount' => $faker->numberBetween(0, 99999),
        'tax' => $faker->numberBetween(0, 100),
        'image' => $faker->imageUrl(600, 600),
        'length' => $faker->randomDigit,
        'height' => $faker->randomDigit,
        'width' => $faker->randomDigit,
    ];
});
