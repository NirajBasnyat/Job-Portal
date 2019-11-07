<?php

namespace App\Http\Controllers;

use Session;
use App\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['seeker']);
    }

    public function store(Request $request)
    {
        $education = new Education();
        $education->course = $request->course;
        $education->institution = $request->institution;
        $education->completed_year = $request->completed_year;
        $education->user_id = Auth::user()->id;
        $education->save();
        Session::flash('success','Education Added Successfully');
    }

    public function update(Request $request)
    {
        $education = Education::find($request->id);
        $education->course = $request->course;
        $education->institution = $request->institution;
        $education->completed_year = $request->completed_year;
        $education->user_id = Auth::user()->id;
        $education->save();
        Session::flash('success','Education updated Successfully');
    }

    public function delete(Request $request)
    {
        $education = Education::find($request->id);
        $education->delete();
        Session::flash('success','Education deleted Successfully');
    }
}
