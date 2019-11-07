<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    public $guarded = [];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
