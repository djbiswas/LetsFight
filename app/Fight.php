<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Fight extends Model
{
    protected $guarded =[];

    public function players(){

        return $this->belongsToMany(Player::class)->using(FightPlayer::class) ;
    }

    public function votes(){

        return $this->hasMany(Vote::class) ;
    }
}
