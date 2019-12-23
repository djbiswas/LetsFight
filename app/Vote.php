<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $guarded =[];

    public function fight(){

        return $this->belongsTo(Fight::class) ;
    }
}
