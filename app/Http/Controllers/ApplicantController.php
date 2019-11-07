<?php

namespace App\Http\Controllers;

use Session;
use App\Job;
use App\User;
use App\Skill;
use App\Profile;
use App\Education;
use App\Work;
use App\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('seeker')->except('view');
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('Applicant.show', compact('job'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'application_letter' => 'required|string'
        ]);

        $applicant = new Applicant();
        $applicant->application_letter = $request->application_letter;
        $applicant->status = 'pending';
        $applicant->job_id = $request->job;
        $applicant->user_id = auth()->user()->id;
        $applicant->save();

        $applicant->jobs()->attach($id);//$id->job_id //applicant->id is placed automatically in db
        Session::flash('success', 'Application for the job sent successfully');
        return redirect()->back();
    }

    public function view($id) //view of applicant not application
    {
        $user = User::findOrFail($id);
        $skills = Skill::orderBy('name', 'asc')->get();
        $profile = Profile::where('user_id', $id)->first();
        $educations = Education::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        $works = Work::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Applicant.applicant_view', compact('user', 'profile', 'skills', 'educations', 'works'));
    }
}
