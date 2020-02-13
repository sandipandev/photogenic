<?php

namespace App\Http\Controllers;

use App\model\city_master;
use App\model\UserArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        //dd(Auth::user()->id);
        $all_users = UserArchive::where('user_id','!=',Auth::user()->customer_id)->get();
        //$city = city_master::find($all_users->city);
        //dd($all_users);
        return view('home',compact('all_users'));
    }
}
