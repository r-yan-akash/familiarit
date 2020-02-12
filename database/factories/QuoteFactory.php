<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quote;
use Faker\Generator as Faker;

$factory->define(Quote::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(10),
        'mobile'=>$faker->randomElement(['017','013','014','015']).rand(11111111,99999999),
        'email'=>$faker->unique()->safeEmail,
        'description'=>$faker->text(200),
        'document'=>$faker->text(100),
        'reference1'=>$faker->text(50),
        'reference2'=>$faker->text(50),
        'reference3'=>$faker->text(50),
    ];
});
//$table->string('title');
//$table->string('mobile');
//$table->string('email');
//$table->string('description');
//$table->string('document');
//$table->string('reference1');
//$table->string('reference2');
//$table->string('reference3');
