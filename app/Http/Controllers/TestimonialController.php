<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->admin) {
            $testimonals = Testimonial::all();
        } else {
            $testimonals = Testimonial::where('user_id', $user->id)->get();
        }
        return view('Testimonials.index')->withTestimonials($testimonals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->admin) {
            return redirect('/home');
        }
        return view('Testimonials.create');
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
            'user_id' => 'unique:testimonials',
            'title' => 'required|min:2|string',
            'description' => 'required|min:2|string',
        ]);

        $user = Auth::user();
        $testimonial = new Testimonial();
        $testimonial->title = $request->title;
        $testimonial->description = $request->description;
        $testimonial->user_id = $user->id;
        $testimonial->save();
        Session::flash('success', 'Testimonials Created Successfully!');
        return redirect('testimonial');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $testimonial = Testimonial::findOrFail($id);
        if ($user->admin) {
            return redirect('/home');
        }
        return view('Testimonials.edit')->withTestimonial($testimonial);
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
            'title' => 'required|min:2|string',
            'description' => 'required|min:2|string',
        ]);

        $user = Auth::user();
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->title = $request->title;
        $testimonial->description = $request->description;
        $testimonial->user_id = $user->id;
        $testimonial->save();
        Session::flash('success', 'Testimonials Updated Successfully!');
        return redirect('testimonial');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->approved) {
            Session::flash('success', 'Approved testimonials cannot be deleted !');
            return redirect()->back();
        }
        $testimonial->delete();
        Session::flash('success', 'Testimonials Destroyed Successfully!');
        return redirect('testimonial');
    }

    public function approve($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->approved = 1;
        $testimonial->save();

        Session::flash('success', 'Testimonials Approved Successfully!');
        return redirect('testimonial');

    }

    public function disapprove($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->approved = 0;
        $testimonial->save();

        Session::flash('success', 'Testimonials Disapproved Successfully!');
        return redirect('testimonial');

    }
}
