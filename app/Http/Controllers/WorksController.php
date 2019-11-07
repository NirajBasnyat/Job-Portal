<?php

namespace App\Http\Controllers;

use Session;
use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['seeker']);
    }

    public function store(Request $request)
    {
        $work = new Work();
        $work->position = $request->position;
        $work->company = $request->company;
        $work->year = $request->year;
        $work->description = $request->description;
        $work->user_id = Auth::user()->id;
        $work->save();
        Session::flash('success','Work Experience Added Successfully');
        //return redirect()->back();
    }

    public function update(Request $request)
    {
        $work =  Work::find($request->id);
        $work->position = $request->position;
        $work->company = $request->company;
        $work->year = $request->year;
        $work->description = $request->description;
        $work->user_id = Auth::user()->id;
        $work->save();
        Session::flash('success','Work Experience Updated Successfully');
       // return redirect()->back();
    }

    public function delete(Request $request)
    {
        $work = Work::find($request->id);
        $work->delete();
        Session::flash('success','Work Experience Updated Successfully');
      //  return redirect()->back();
    }
}
