<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function roles(){
        return $this->belongsToMany(Role::class)->select(['roles.id']);
    }
}
