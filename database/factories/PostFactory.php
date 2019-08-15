<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'post_title' => $faker->realText($maxNbChars = 50),
        'post_text' => $faker->realText($maxNbChars = 1500, $indexSize = 5),
        'archived' => 1,
        'user_id' => 1
    ];
});
