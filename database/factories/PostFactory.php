<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $post_title = $faker->realText($maxNbChars = 50);

    return [
        'post_title' => $post_title,
        'post_text' => $faker->realText($maxNbChars = 1500, $indexSize = 5),
        'slug' => str_replace(' ', '-', strtolower($post_title)),
        'archived' => 0,
        'user_id' => 1
    ];
});
