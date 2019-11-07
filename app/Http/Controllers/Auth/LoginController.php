<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     *    protected $redirectTo = '/home';
     */


    public function redirectPath()
    {
        if(Auth::user()->admin){
            return ('/home');
        }elseif (Auth::user()->role === 1){
            return ('seeker/profile/'.Auth::user()->name);
        }elseif(Auth::user()->role === 2){
            return ('/provider/company/'.Auth::user()->name);
        }else{
            return ('/login');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
