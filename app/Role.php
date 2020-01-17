<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function notices(){
        return $this->belongsToMany(Notice::class);
    }
}
