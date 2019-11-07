<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Session;
use App\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarksController extends Controller
{
    public function addBookmark($id) //$Job_id
    {
        Bookmark::create([
            'job_id' => $id,
            'user_id' => Auth::id()
        ]);

        Session::flash('success', 'Successfully added to bookmarks');
        return redirect()->back();
    }

    public function removeBookmark($id) //$Job_id
    {
        $bookmark = Bookmark::where('job_id', $id)->where('user_id', Auth::id())->first();
        $bookmark->delete();
        Session::flash('success', 'Successfully removed bookmarks');
        return redirect()->back();

    }

    public function myBookmarks()
    {
       // $bookmarks = Bookmark::where('user_id',Auth::id())->get();
        $jobs = DB::table('jobs')->join('bookmarks','jobs.id','=','bookmarks.job_id')->get();
        return view('Bookmark.bookmarks',compact('jobs'));
    }
}
