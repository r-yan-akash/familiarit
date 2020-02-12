<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName('male').''.$faker->lastName,
        'subject'=>$faker->sentence(10),
        'mobile' => $faker->randomElement(['017','013','014','015']).rand(11111111,99999999),
        'email'=>$faker->unique()->safeEmail,
        'message'=>$faker->text(50),
    ];
});

//$table->bigIncrements('id');
//$table->string('name');
//$table->string('subject');
//$table->string('mobile');
//$table->string('email');
//$table->text('message');
