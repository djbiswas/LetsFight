<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {


    return [
        'body' => $faker->paragraph(random_int(1,3)),
        'user_id' => \App\User::all()->random()->id,
        'fight_id' => \App\Fight::all()->random()->id
    ];
});
