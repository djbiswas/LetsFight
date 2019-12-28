<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded =[];

    protected $with = ['user'];
    public function fight(){

        return $this->belongsTo(Fight::class) ;
    }

    public function user(){

        return $this->belongsTo(User::class) ;
    }
}
