<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $guarded = [];
    protected $primaryKey = 'user_id'; //see in shortlist.blade's hire
    public $incrementing = false;

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
