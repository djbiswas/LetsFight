<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Fight extends Model
{
    protected $guarded =[];

   // protected $withCount = ['votes','comments'];

    public function players(){

        return $this->belongsToMany(Player::class)->using(FightPlayer::class) ;
    }

    public function votes(){

        return $this->hasMany(Vote::class) ;
    }

    public function fightCategory(){

        return $this->belongsTo(FightCategory::class) ;
    }
    public function comments(){

        return $this->hasMany(Comment::class) ;
    }


}
