<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->realText($maxNbChars = 1000),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'rooms_number' => $faker->randomDigitNotNull,
        'guests_number' => $faker->randomDigitNotNull,
        'bathrooms' => $faker->randomDigitNotNull,
        'area_sm' => $faker->numberBetween($min = 40, $max = 300),
        'address_lat' => $faker->randomFloat($nbMaxDecimals = 6, $min = -90, $max = 90),
        'address_lon' => $faker->randomFloat($nbMaxDecimals = 6, $min = -180, $max = 180),
        'image' => $faker->image($dir = '/tmp', $width = 1080, $height = 720)
    ];
});
