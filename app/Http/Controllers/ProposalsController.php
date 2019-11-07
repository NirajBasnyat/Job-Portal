<?php

namespace App\Http\Controllers;

use Session;
use App\Job;
use App\User;
use App\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProposalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('provider');
    }

    public function shortlist($id)
    {
        $job = Job::findOrFail($id);
        $applicants = DB::table('applicants')
            ->join('profiles', 'applicants.user_id', '=', 'profiles.user_id')
            ->join('jobs', 'applicants.job_id', '=', 'jobs.id')
            ->join('users', 'applicants.user_id', '=', 'users.id')
            ->where(function ($query) use ($id) {
                $query->where('applicants.job_id', $id);
            })
            ->orderBy('applicants.created_at', 'desc')
            ->get();

        return view('Proposal.shortlist', compact('job', 'applicants'));
    }

    public function hire($id, $user)
    {
        //to hire specific person both job_id and user_id should match

        $applicant = DB::table('applicants')
            ->when($id, function ($query) use ($id) {
                return $query->where('job_id', $id);
            })
            ->when($user, function ($query) use ($user) {
                return $query->where('user_id', $user);
            })
            ->update(['status' => 'hired']);
        Session::flash('success', 'You have successfully hired');
        return redirect()->route('jobs.index');
    }

    public function reject($id, $user)
    {
        $applicant = DB::table('applicants')
            ->when($id, function ($query) use ($id) {
                return $query->where('job_id', $id);
            })
            ->when($user, function ($query) use ($user) {
                return $query->where('user_id', $user);
            })
            ->update(['status' => 'rejected']);
        Session::flash('success', 'You have rejected successfully');
        return redirect()->route('jobs.index');
    }


   /* public function proposal($id, $user_id) {

        $job = Job::findOrFail($id);
        $applicant = DB::table('users')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('applicants', 'users.id', '=', 'applicants.user_id')
            ->when($id, function ($query) use ($id) {
                return $query->where('applicants.job_id', $id);
            })
            ->when($user_id, function ($query) use ($user_id) {
                return $query->where('applicants.user_id', $user_id);
            })
            ->first();

        return view('Proposal.proposal',compact('job','applicant'));

    }*/
}
