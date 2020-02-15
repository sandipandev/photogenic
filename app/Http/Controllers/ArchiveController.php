<?php

namespace App\Http\Controllers;

use App\model\plan;
use App\model\Award;
use App\model\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    protected function get_user_id()
    {
        return $user_id = Auth::user()->customer_id;
    }

    public function index()
    {   
        $user_information = $this->user_information();
        $user_id = $user_information->user_id;
        $user_details = $user_information->user_details;
        $archives = $user_information->archives;
        $plan = $user_information->plan;
        
        return view('archive',compact('user_id','user_details','archives','plan'));

    }
    
    public function user_information()
    {
        $user_id = Auth::user()->id;
        $user_details = DB::table('users')->where('id',$user_id)->first();
        $archives = Archive::where('user_id',$user_id)->get();
        $plan = plan::where('client_entity',$user_details->client_entity_id)->first();
        return (object)['user_id'=>$user_id,'user_details'=>$user_details,'archives'=>$archives,'plan'=>$plan];
    }
    
    public function store_archive_picture(Request $req)
    {
        $this->validate($req,[
            'archive_title' => 'required',
            'archive_description' => 'required|max:240',
        ]);
        $user_information = $this->user_information();
        $user_id = $user_information->user_id;
        $user_details = $user_information->user_details;
        $archives = $user_information->archives;
        $plan = $user_information->plan;
        if (count($archives)==$plan->no_of_picture_in_personal_gallery){
            return redirect('/archive')->with('message','You Can not Upload more images');
        }
        $user_id = $this->get_user_id();
        //Store In Storage Folder
        $store = $req->file('archive_picture')->storeAs('public/'.$user_id. '/archive_picture',time().$req->archive_picture->getClientOriginalName());
        $path = $user_id.'/archive_picture/'.time().$req->archive_picture->getClientOriginalName();
        $req->user()->archives()->create([
            'archive_title'=>$req->archive_title,
            'archive_description'=>$req->archive_description,
            'archive_image_link'=>$path,
            ]);
        return redirect('/archive')->with('message','Successfully Uploaded');
        
    }

    public function deleteArchive(Request $req)
    {
        $user_id = $this->get_user_id();
        $file_path = Archive::where('id', $req->archive_id)->pluck('archive_image_link');
        $delete_file_from_storage = Storage::delete('public/'.$file_path[0]);
        
        archive::where('id', $req->archive_id)->delete();
        return redirect('/archive')->with('message','Successfully Deleted');
    }
}

