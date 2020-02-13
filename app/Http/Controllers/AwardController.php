<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AwardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        $user_id = Auth::user()->id;
        //dd($user_id);
        $user_details = DB::table('users')->where('id',$user_id)->get();
        //dd($user_details);
        return view('award',compact('user_details'));

    }
}
