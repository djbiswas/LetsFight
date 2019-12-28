<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    protected $guarded =[];
    public function player(){

        return $this->hasOne(Player::class) ;
    }
}
