<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    $blog_picture = "storage/site_images/blog_posts/blog_placeholder.png";
    return [
      'cover_picture'=>$blog_picture,
      'category_id'=>$faker->numberBetween($min = 1, $max = 5),
      'user_id' => $faker->numberBetween($min = 0, $max = 30),
      'title' =>$faker->sentence(10),
      'summary'=>$faker->sentence(20),
      'content'=>$faker->realText()
    ];
});
