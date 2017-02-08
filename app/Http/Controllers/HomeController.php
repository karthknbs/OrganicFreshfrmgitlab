<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin==1)
        {
          //  $users = User::count();
            return view('Admin.home');
        }else{
            return view('home');
        }

    }

    /**
     * @return mixed
     */
    public function Usercount()
    {
        $users = User::count();
        return response()->json($users);
    }
}
