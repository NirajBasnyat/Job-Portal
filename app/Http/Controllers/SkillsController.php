<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['seeker']);
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->skills()->attach($request->skills);
        Session::flash('success','Skills added successfully');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->skills()->sync($request->skills);
        Session::flash('success','Skills updated successfully');
        return redirect()->back();
    }
}
