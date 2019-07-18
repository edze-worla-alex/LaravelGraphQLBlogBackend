<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
  $category_picture = "site_images/category/category_placeholder.png";

    return [
      'name' => $faker->text(5),
      'user_id'=>'',
      'cover_picture'=>$category_picture,
      'description'=>$faker->text(10)
    ];
});
