<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\People;
use Faker\Generator as Faker;

$factory->define(People::class, function (Faker $faker) {
    $created = $faker->dateTimeBetween('-50 days', '-20 days');
    return [
        'name' => $faker->name,
        'position' => $faker->jobTitle,
        'text' => $faker->realText(rand(100, 150)),
        'images' => $faker->imageUrl(246, 246, 'people', true, 'Faker', true),
        'created_at' => $created,
        'updated_at' => $created,
    ];
});
