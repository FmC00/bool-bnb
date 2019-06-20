<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
      'mail' => $faker->email,
      'name' => $faker->name,
      'content' => $faker->realText($maxNbChars = 1000),
    ];
});
