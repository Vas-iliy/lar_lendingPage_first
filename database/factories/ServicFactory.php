<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Servic;
use Faker\Generator as Faker;

$factory->define(Servic::class, function (Faker $faker) {
    $created = $faker->dateTimeBetween('-10 days', '-1 days');
    return [
        'name' => $faker->company,
        'text' => $faker->realText(rand(100, 500)),
        'icon' => $faker->imageUrl(100, 100),
        'created_at' => $created,
        'updated_at' => $created
    ];
});
