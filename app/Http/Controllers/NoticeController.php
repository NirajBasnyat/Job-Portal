<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Role;
use App\User;
use App\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NoticeAddedNotification;

class NoticeController extends Controller
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
        if (\auth()->user()->role == 1) {
            return redirect()->back();
        }
        return view('Notice.index')->with('notices', Notice::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get user_type to whom we can send notice
        $user = Auth::user();
        if ($user->admin) {
            $roles = Role::all(); //if sender is admin we can send to all people
        } elseif (!$user->admin && $user->role == 2) {
            $roles = Role::where('id', 1)->get(); //if sender is job Provider we can send to seeker
        } else {
            $roles = [];
        }
        return view('Notice.create')->withRoles($roles);
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
            'title' => 'required|string|min:2',
            'description' => 'required|string'
        ]);

        //saving notification
        $notice = new Notice();
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->user_id = Auth::user()->id;
        $notice->save();

        $notice->roles()->attach($request->roles);

        //sending notification
        $arr = [];
        //getting id of roles in an array
        foreach ($notice->roles()->get() as $role) {
            array_push($arr, $role->id);
        }
        //getting user with those roles
        $user = User::whereIn('role', $arr)->get();

        if (\Notification::send($user, new NoticeAddedNotification(Notice::latest('id')->first()))) {
            return back();
        }
        Session::flash('success', 'Notice Added Successfully!');
        return redirect('notice');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $notice = Notice::find($id);
        return view('Notice.show')->with('notice', $notice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::find($id);
        $user = Auth::user();

        if ($user->admin) {
            $roles = Role::all(); //all checkboxes
        } elseif ($user->id == $notice->user_id) {
            $roles = Role::where('id', 1)->get();
        } else {
            $roles = array(); //no checkboxes
        }
        return view('Notice.edit')->with(compact('notice', 'roles'));
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
            'description' => 'required',
        ]);

        $notice = Notice::find($id);

        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->save();


        $notice->roles()->sync($request->roles);

        Session::flash('success', 'Notice updated successfully');
        return redirect()->route('notice.index')->with('success', 'Notice Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);

        //to determine the sender of the notice.
        $user = User::where('id', $notice->user_id)->first();

        //----to determine the recipient roles of the notice.

        $arr = [];
        //getting id of roles in an array
        foreach ($notice->roles()->get() as $role) {
            array_push($arr, $role->id);
        }
        //getting user with those roles
        $roles = User::whereIn('role', $arr)->get();

        foreach ($roles as $role) {
            //get notices where sender and role matches [as there can be multiple sender sending to multiple roles]
            $notice_notifications = DB::table('notifications')
                ->where('type', 'App\Notifications\NoticeAddedNotification')
                ->where('data', 'like', '%"user_id":' . $notice->user_id . '%')
                ->where('notifiable_id', 'like', '%' . $role->id . '%')
                ->get();
            //if there are multiple notices
            foreach ($notice_notifications as $notice_notification) {
                //find the user based on notification_table
                $user1 = User::where('id', $notice_notification->notifiable_id)->first();
                //delete notification of that specific user
                $user1->notifications->where('id', $notice_notification->id)->first()->delete();
            }
        }

        $notice->roles()->detach();
        $notice->delete();
        Session::flash('success', 'Notice Destroyed Successfully!');
        return redirect()->route('notice.index')->with('success', 'Notice Deleted');
    }
}
