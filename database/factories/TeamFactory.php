<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {

    $teams = ['Chelsea', 'Arsenal', 'Manchester City', 'Liverpool'];
    return [
        'name' => $faker->unique()->randomElement($teams),
    ];
});
