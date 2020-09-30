<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Match;
use Faker\Generator as Faker;

$factory->define(Match::class, function (Faker $faker) {

    // get list of all teams' ids
    $ids = App\Team::where('id' ,'>' ,0)->pluck('id')->toArray();

    // pick a random team 1
    $random = array_rand($ids);
    $team1 = $ids[$random];

    // remove team 1 from the list
    unset($ids[$random]);

    // pick a random team 2
    $random = array_rand($ids);
    $team2 = $ids[$random];

    return [
        'team_id1' => $team1,
        'team_id2' => $team2,
        'week' => $faker->numberBetween(1, 5),
    ];
});
