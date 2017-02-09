<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Categoryy;
use App\Product;
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
        $category = Categoryy::where('Active','=',1)->get();
        $products = Product::where('discount_price','!=',null)->get();
         return view('homepage',compact('category','products'));
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
