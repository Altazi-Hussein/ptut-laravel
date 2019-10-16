<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rdv;
use Illuminate\Support\Str;

$factory->define(App\Rdv::class, function (Faker $faker) {
    $start_time = now()->addHours(rand(1, 100));
    return [
        'patient' => App\Patient::inRandomOrder()->first()->id,
        'infirmiere' => App\User::inRandomOrder()->first()->id,
        'start_time' => $start_time->format('Y-m-d H') . ':00',
        'finish_time' => $start_time->addHours(rand(1, 2))->format('Y-m-d H') . ':00',
        'raison' => Str::random()
    ];
});
