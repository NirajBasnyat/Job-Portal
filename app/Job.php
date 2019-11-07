<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //many to many is used for storage purposes only
    public function applicants()
    {
        return $this->belongsToMany(Applicant::class, 'applicant_job', 'job_id', 'applicant_user_id');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function is_bookmarked()
    {
        $auth_user = Auth::id();

        $all_bookmarks = array();

        foreach ($this->bookmarks as $bookmark):
            array_push($all_bookmarks, $bookmark->user_id);
        endforeach;

        if (in_array($auth_user,$all_bookmarks)){
            return true;
        }else{
            return false;
        }


    }
}
