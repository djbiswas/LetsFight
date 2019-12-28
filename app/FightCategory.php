<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FightCategory extends Model
{
    protected $guarded =[];
   // protected $with = ['fights.players'];
    public function fights(){

        return $this->hasMany(Fight::class);

    }

    public function players(){

        return $this->hasManyThrough(Player::class, Fight::class) ;
    }

}
