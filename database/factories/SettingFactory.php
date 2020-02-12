<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'day'=>$faker->dayOfWeek('7'),
        'contact_1' => $faker->randomElement(['017','013','014','015']).rand(11111111,99999999),
        'contact_2' => $faker->randomElement(['017','013','014','015']).rand(11111111,99999999),
        'email_1' => $faker->unique()->safeEmail,
        'email_2' => $faker->unique()->safeEmail,
        'address' => $faker->streetAddress,
        'meta'=>$faker->url,
        'google_analytics'=>$faker->url,
        'fb_id'=>$faker->url,
        'pinterest'=>$faker->url,
        'instagram'=>$faker->url,
    ];
});

//$table->string('day');
//$table->string('contact1');
//$table->string('email_1');
//$table->string('email_2');
//$table->string('meta');
//$table->string('google_analytics');
//$table->string('fb_id');
//$table->string('pinterest');
//$table->string('instagram');
