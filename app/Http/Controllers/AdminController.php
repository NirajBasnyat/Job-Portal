<?php

namespace App\Http\Controllers;

use Session;
use App\Job;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('dashboard');
    }

    public function dashboard()
    {
        $job_count = Job::all();
        $seeker_count = User::where('role', 1)->get();
        $provider_count = User::where('role',2)->get();
        return view('Admin.dashboard',compact('job_count','seeker_count','provider_count'));
    }

    public function index()
    {
        $seekers = User::where('role', 1)->orWhere('role',4)->get();
        $providers = User::where('role',2)->orWhere('role', 3)->get();
        $admins = User::where('admin',1)->get();

        return view('Admin.all_users',compact('seekers','providers','admins'));
    }

    public function banProvider($id)
    {
        $user = User::findOrFail($id);
        $user->role = 3;
        $user->save();
        Session::flash('success','User banned successfully');

        return redirect()->back();
    }

    public function unbanProvider($id)
    {
        $user = User::findOrFail($id);
        $user->role = 2;
        $user->save();
        Session::flash('success','User Unbanned successfully');

        return redirect()->back();
    }

    public function banSeeker($id)
    {
        $user = User::findOrFail($id);
        $user->role = 4;
        $user->save();
        Session::flash('success','User banned successfully');

        return redirect()->back();
    }

    public function unbanSeeker($id)
    {
        $user = User::findOrFail($id);
        $user->role = 1;
        $user->save();
        Session::flash('success','User Unbanned successfully');

        return redirect()->back();
    }
}
