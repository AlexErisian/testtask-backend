<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $randWeight = rand(1, 10) > 1 ? random_int(90, 290) : 0;
    $randHeight = rand(1, 10) < 1 ?
        sprintf("%d'%d\"", random_int(4, 6), random_int(0, 99)) :
        "0'0\"";
    $position = rand(1, 10) > 2 ? 'Developer' : 'Manager';

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => random_int(500000, 1000000000),
        'weight' => $randWeight,
        'height' => $randHeight,
        'salary' => random_int(500, 50000),
        'position' => $position,
    ];
});
