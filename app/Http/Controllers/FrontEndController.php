<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobCategory;
use App\Testimonial;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    public function index()
    {
        //job id's where job applicant is hired -> used to exclude those jobs from all jobs
        $excluding_ids = DB::table('jobs')
            ->join('applicants', 'jobs.id', '=', 'applicants.job_id')
            ->where('status', 'hired')
            ->orWhere('status', '')->pluck('applicants.job_id');

        return view('welcome')
            ->withCategories(JobCategory::all())
            ->with('first_testimonial', Testimonial::where('approved', 1)->orderBy('created_at', 'desc')->first())
            ->with('second_testimonial', Testimonial::where('approved', 1)->orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
            ->with('third_testimonial', Testimonial::where('approved', 1)->orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
            ->with('mostViewedJob', Job::whereNotIn('id', $excluding_ids->toArray())->orderBy('count', 'desc')->first())
            ->with('recentJobs', Job::whereNotIn('id', $excluding_ids->toArray())->orderBy('created_at', 'desc')->take(2)->get());

    }

    public function front_jobs()
    {

    }


}
