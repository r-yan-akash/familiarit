<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName('male').''.$faker->lastName,
        'designation'=>$faker->text('20'),
        'facebook'=>$faker->url,
        'twitter'=>$faker->url,
        'skype'=>$faker->url,
        'linkedin'=>$faker->url,
    ];
});

//$table->bigIncrements('id');
//$table->string('name');
//$table->string('designation');
//$table->string('image');
//$table->string('facebook');
//$table->string('twitter');
//$table->string('skype');
//$table->string('linkedin');
