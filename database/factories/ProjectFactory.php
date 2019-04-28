<?php

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->words(3, true)),
        'start_at' => $faker->dateTimeBetween('-4 weeks', '+4 weeks'),
        'end_at' => $faker->dateTimeBetween('+5 weeks', '+13 weeks'),
    ];
});
