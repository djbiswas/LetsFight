<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FightPlayer;
use App\Vote;
use Faker\Generator as Faker;

$factory->define(Vote::class, function (Faker $faker) {
    $fightPlayer = FightPlayer::all()->random();
    return [
        'fight_id' => $fightPlayer->fight_id,
        'visitor_ip' => $faker->ipv4,
        'player_id' => $fightPlayer->player_id
    ];
});
