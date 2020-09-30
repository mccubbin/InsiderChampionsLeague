<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TeamMatch;
use Faker\Generator as Faker;

$factory->define(TeamMatch::class, function (Faker $faker) {

    return [
        'match_id' => 1,
        'team_id' => 1,
        'points' => $faker->numberBetween(1, 8),
    ];
});