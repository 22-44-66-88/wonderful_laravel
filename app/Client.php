<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function articles(){
        return $this->belongsToMany(Article::class);
    }
}
