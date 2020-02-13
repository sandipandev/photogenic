<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    protected function get_user_id()
    {
        return $user_id = Auth::user()->id;
    }

    
    
    public function index()
    {   
        $user_id = Auth::user()->id;
        //dd($user_id);
        $user_details = DB::table('users')->where('id',$user_id)->get();
        //dd($user_details);
        return view('archive',compact('user_details'));

    }



    public function store_archive_picture(Request $req)
    {
        $user_id = $this->get_user_id();
        $user_name = Auth::user()->name;

        //Store In Storage Folder
        $store = $req->file('archive_picture')->storeAs('public/'.$user_name. '/archive_picture',time().$req->archive_picture->getClientOriginalName());
        $path = $user_name.'/archive_picture/'.time().$req->archive_picture->getClientOriginalName();
        
    }

}

