<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'height' => $faker->numberBetween(60,75),
        'weight' => $faker->numberBetween(60,150),
        'age' => $faker->numberBetween(20,45),
        'from' => $faker->country,
        'identity' => null,
        'weapon_id' => \App\Weapon::all()->random()->id
    ];
});
