<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Bookmark extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job(){
        return $this->belongsTo(Job::class);
    }
}
