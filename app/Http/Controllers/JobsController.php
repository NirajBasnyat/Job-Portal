<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('provider')->except('show','cat');
        $this->middleware('seeker')->only('show','cat');
    }

    public function index()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('Jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = JobCategory::all();
        return view('Jobs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required',
            'budget' => 'required',
            'position_type' => 'required',
            'category_id' => 'required',
            'project_duration' => 'required'
        ]);

        $id = auth()->user()->id;
        $job = Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'budget' => $request->budget,
            'position_type' => $request->position_type,
            'project_duration' => $request->project_duration,
            'category_id' => $request->category_id,
            'user_id' => $id
        ]);

        Session::flash('success', 'Job created successfully');
        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //$job_id
    {
        $user_id = auth()->user()->id;
        $job = Job::findOrFail($id);
        $job_count = Job::where('user_id', $job->user_id)->get(); //count to display in view

        //TO STORE COUNT in db
        $jobKey = 'job_' . $job->id; //make a unique
        if (!Session::has($jobKey)) {//if(unique key doesn't exist)
            $job->count++;  //increment count
            Session::put($jobKey, 1); //only need single key
        }

        $job->save();

        //exists = applicant with right job_id and user_id is there or not
        $exists = DB::table('applicants')
            ->join('jobs', 'jobs.id', '=', 'applicants.job_id')
            ->when($id, function ($query) use ($id) {
                return $query->where('applicants.job_id', $id);
            })
            ->when($user_id, function ($query) use ($user_id) {
                return $query->where('applicants.user_id', $user_id);
            })->first();

        if ($exists == null) {
            $result = 'not exist';
        } else {
            $result = 'exist';
        }

        return view('Jobs.show', compact('job', 'job_count', 'result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $categories = JobCategory::all();
        return view('Jobs.edit', compact('job', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required',
            'budget' => 'required',
            'position_type' => 'required',
            'category_id' => 'required',
            'project_duration' => 'required'
        ]);

        $user_id = auth()->user()->id;
        $job = Job::findOrFail($id);
        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'budget' => $request->budget,
            'position_type' => $request->position_type,
            'project_duration' => $request->project_duration,
            'category_id' => $request->category_id,
            'user_id' => $user_id
        ]);
        Session::flash('success', 'Job updated successfully');
        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        Session::flash('success', 'Job deleted successfully');
        return redirect()->route('jobs.index');
    }

    public function cat($id)
    {
        $jobs = Job::where('category_id',$id)->get();
        return view('Jobs.job_cat')->withJobs($jobs);
    }
}
