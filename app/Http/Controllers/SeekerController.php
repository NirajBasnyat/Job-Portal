<?php

namespace App\Http\Controllers;

use App\User;
use File;
use Session;
use App\Job;
use App\Work;
use App\Skill;
use App\Profile;
use App\Education;
use App\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SeekerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['seeker']);
    }

    public function index()
    {
        //job id's where job applicant is hired -> used to exclude those jobs from all jobs
        $excluding_ids = DB::table('jobs')
            ->join('applicants', 'jobs.id', '=', 'applicants.job_id')
            ->where('status', 'hired')
            ->orWhere('status', '')->pluck('applicants.job_id');

     //   $jobs = Job::all();
        $jobs = Job::whereNotIn('id', $excluding_ids->toArray())->paginate(5);
        $mostViewedJobs = Job::whereNotIn('id', $excluding_ids->toArray())->orderBy('count', 'desc')->paginate(10);
        $recentJobs = Job::whereNotIn('id', $excluding_ids->toArray())->orderBy('created_at', 'desc')->paginate(10);
        $categories = JobCategory::all();
        return view('Job_Seeker.all_jobs', compact('jobs', 'categories', 'mostViewedJobs', 'recentJobs'));
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile()->first();
        $skills = Skill::all();
        $works = Work::where('user_id', $user->id)->get();
        $educations = Education::where('user_id', $user->id)->get();

        return view('Job_Seeker.profile', compact('user', 'profile', 'skills', 'works', 'educations'));
    }

    public function store(Request $request)
    {
        $profile = new Profile;
        $profile->job_title = $request->title;
        $profile->city = $request->city;
        $profile->country = $request->country;
        $profile->overview = $request->overview;
        $profile->user_id = Auth::user()->id;
        $profile->save();
        Session::flash('success', 'Profile Information Saved!');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $profile = Profile::where('user_id', $id)->first();
        $profile->job_title = $request->title;
        $profile->city = $request->city;
        $profile->country = $request->country;
        $profile->overview = $request->overview;
        $profile->save();
        Session::flash('success', 'Profile Updated Successfully!');
    }

    public function storeAvatar(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();

        //delete old file
        // if ($profile->avatar) {
        //     File::delete(public_path('Avatar/' . $profile->avatar));
        // }
        
        //store new file
        if ($request->hasFile('profileAvatar')) {
            $image = $request->file('profileAvatar');
            $type = pathinfo($image, PATHINFO_EXTENSION);
            $filename = time() . '.' . $image->GetClientOriginalExtension();
            $location = $request->file('profileAvatar')->storeAs('public/Avatar', $filename);
            $profile->avatar = $filename;
        }
        $profile->save();
        Session::flash('success', 'Profile Avatar added Successfully!');
        //  return redirect()->back();

    }

    public function myJobs()
    {
        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        $jobs = DB::table('applicants')
            ->join('jobs', 'applicants.job_id', '=', 'jobs.id')
            ->when($id, function ($query) use ($id) {
                return $query->where('applicants.user_id', $id);
            })
            ->orderBy('applicants.created_at', 'desc')
            ->get();
        return view('Job_Seeker.my_jobs', compact('jobs', 'user'));
    }


}
