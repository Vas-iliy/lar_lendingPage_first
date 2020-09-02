<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {

    $name = $faker->realText(rand(10, 20));
    $title = $faker->realText(rand(40, 70));
    $text = $faker->realText(rand(70, 150));
    $created = $faker->dateTimeBetween('-10 days', '-1 days');

    return [
        'name' => $name,
        'alias' => $name,
        'title' => $title,
        'text' => $text,
        'images' => $faker->imageUrl(600, 600),
        'created_at' => $created,
        'updated_at' => $created
    ];
});
