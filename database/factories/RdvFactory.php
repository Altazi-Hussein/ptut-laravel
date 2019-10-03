<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rdv;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Rdv::class, function (Faker $faker) {
    return [
        'patient' => $faker->name,
        'raison' => Str::random()
    ];
});
