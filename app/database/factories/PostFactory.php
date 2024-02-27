<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'=> $faker->randomDigit,
        'post_id'=> $faker->randomDigit,
        'restrant'=> $faker->word,
        'message'=> $faker->realText,
        'image'=> $faker->image,
    ];
});
