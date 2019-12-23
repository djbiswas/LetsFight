<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded =[];


    public function fights(){

        return $this->belongsToMany(Fight::class)
                    ->as('match')->withTimestamps(); ;
    }

    public function category(){

        return $this->belongsTo(FightCategory::class) ;
    }
}
