<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' =>  $faker->randomDigit,
        'article_id' => $faker->randomDigit,
        'comment' => $faker->realText(100),
    ];
});