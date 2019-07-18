<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
    'user_id'=>$faker->numberBetween($min = 0, $max = 30),
    'blogpost_id'=>$faker->numberBetween($min = 0, $max = 30),
    'response'=>$faker->text(15)
    ];
});
