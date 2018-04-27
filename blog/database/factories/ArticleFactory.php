<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'id_user'=> $faker ->randomDigit,
        'title' => $faker->word,
        'content' => str_random(28),
        'tags' => str_random(10),
    ];
});
