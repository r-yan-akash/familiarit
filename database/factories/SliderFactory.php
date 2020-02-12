<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(10),
        'motion'=>$faker->sentence(10),
        'description'=>$faker->text(200),
        'link1'=>$faker->url,
        'link2'=>$faker->url,
        'image' => $faker->image('public/storage/images',640,480, null, false),
    ];
});

//$table->bigIncrements('id');
//$table->string('title');
//$table->string('motion');
//$table->string('description');
//$table->string('description');
//$table->string('link1');
//$table->string('link2');
//$table->string('image');
//$table->timestamps();
