<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

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
