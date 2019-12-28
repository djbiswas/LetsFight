<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded =[];

    protected $with= ['weapon'];
    public function fights(){

        return $this->belongsToMany(Fight::class)
                    ->as('match')->withTimestamps(); ;
    }

    public function weapon(){

        return $this->belongsTo(Weapon::class) ;
    }
}
