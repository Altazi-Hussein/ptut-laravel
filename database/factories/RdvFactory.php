<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{Rdv, Patient, User, Type};
use Illuminate\Support\Str;

$factory->define(App\Rdv::class, function () {
    $start_time = now()->addHours(rand(1, 100));
    return [
        'patient_id' => Patient::inRandomOrder()->first()->id,
        //'user_id' => User::inRandomOrder()->first()->id,
        'fait' => false,
        'type_id' => Type::inRandomOrder()->first()->id,
        'ville_id' => rand(1,10),
        'start_time' => $start_time->format('Y-m-d H') . ':00',
        'finish_time' => $start_time->addHours(rand(1, 2))->format('Y-m-d H') . ':00',
    ];
});
