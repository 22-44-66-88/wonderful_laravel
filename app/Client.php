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

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRole($roles){
        if ($this->hasAnyRoles($roles)){
            return true;
        }
//        abort(403,"nos estas autorizado");
    }

    public function hasAnyRoles($roles){
        if (is_array($roles)){
            foreach ($roles as $role){
                if ($this->hasRole($role)){
                    return true;
                }
            }
        }else {
            if ($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if ($this->roles()->where('role',$role)->first()){
            return true;
        }
        return false;
    }
}
