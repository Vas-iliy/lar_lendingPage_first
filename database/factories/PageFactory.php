<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {

    $name = $faker->realText('10');
    $title = $faker->realText('30');
    $text = $faker->realText(rand(70, 150));
    $created = $faker->dateTimeBetween('-10 days', '-1 days');

    return [
        'name' => $name,
        'alias' => $name,
        'title' => $title,
        'text' => $text,
        'images' => $faker->imageUrl(584, 400, 'phones', true, 'Faker', true),
        'created_at' => $created,
        'updated_at' => $created
    ];
});
