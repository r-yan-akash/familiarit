<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName().$faker->lastName(),
        'designation'=>$faker->sentence(10),
        'description'=>$faker->text(255),
        'image' => $faker->image('public/storage/images',640,480, null, false),
    ];
});

