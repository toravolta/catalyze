<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Article;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->words(5, true),
        'content' => $faker->paragraph(10, 3),
        'topic' => rand(1, 3),
        'slug'  => $faker->words(1, true),
        'user_id' => 1
    ];
});
