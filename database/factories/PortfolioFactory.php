<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Portfolio;
use Faker\Generator as Faker;

$factory->define(Portfolio::class, function (Faker $faker) {
    $created = $faker->dateTimeBetween('-10 days', '-1 days');
    return [
        'name' => $faker->streetName,
        'images' => $faker->imageUrl(400, 400, 'natural'),
        'created_at' => $created,
        'updated_at' => $created
    ];
});
