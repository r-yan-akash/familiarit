<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Services;
use Faker\Generator as Faker;

$factory->define(Services::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(15),
        'icon'=>$faker->text(10),
        'description'=>$faker->text(100),
    ];
});

//$table->string('title');
//$table->string('icon');
//$table->string('description');
