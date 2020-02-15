<?php

namespace App\Http\Controllers;

use App\model\plan;
use App\model\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    protected function get_user_id()
    {
        return $user_id = Auth::user()->customer_id;
    }
    
    public function user_information()
    {
        $user_id = Auth::user()->id;
        $user_details = DB::table('users')->where('id',$user_id)->first();
        $awards = Award::where('user_id',$user_id)->get();
        $plan = plan::where('client_entity',$user_details->client_entity_id)->first();
        return (object)['user_id'=>$user_id,'user_details'=>$user_details,'awards'=>$awards,'plan'=>$plan];
    }
    
    public function index()
    {   
        $user_information = $this->user_information();
        $user_id = $user_information->user_id;
        $user_details = $user_information->user_details;
        $awards = $user_information->awards;
        $plan = $user_information->plan;
        //dd($user_id);
        return view('award',compact('user_id','user_details','awards','plan'));
    }
    
    public function storeAward(Request $request)
    {
        $this->validate($request,[
            'award_title' => 'required',
            'award_description' => 'required|max:240',
        ]);
        $user_information = $this->user_information();
        $user_id = $user_information->user_id;
        $user_details = $user_information->user_details;
        $awards = $user_information->awards;
        $plan = $user_information->plan;
        if (count($awards)==$plan->no_of_picture_in_award){
            return redirect('/award')->with('message','You Can not Upload more images');
        }
        $user_id = $this->get_user_id();
        //$user_name = Auth::user()->name;
        $store = $request->file('award')->storeAs('public/'.$user_id. '/award',time().$request->award->getClientOriginalName());
        $path = $user_id.'/award/'.time().$request->award->getClientOriginalName();
        $request->user()->awards()->create([
            'award_title'=>$request->award_title,
            'award_description'=>$request->award_description,
            'award_image_link'=>$path,
            ]);
        return redirect('/award')->with('message','Successfully Uploaded');
    }
    public function deleteAward(Request $req)
    {
        // dd($req->award_id);
        $user_id = $this->get_user_id();
        $file_path = Award::where('id', $req->award_id)->pluck('award_image_link');
        $delete_file_from_storage = Storage::delete('public/'.$file_path[0]);
        
        Award::where('id', $req->award_id)->delete();
        return redirect('/award')->with('message','Successfully Deleted');
    }
    
}
