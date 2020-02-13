<?php

namespace App\Http\Controllers;

use App\model\StateMaster;
use App\model\UserArchive;
use App\model\CountryMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function get_user_id()
    {
        return $user_id = Auth::user()->customer_id;
    }

    protected function get_user_details()
    {
        $user_id = $this->get_user_id();
        $client_entity_id = Auth::user()->client_entity_id;
        $countries = CountryMaster::all();
        $user_entity = UserArchive::FindUserEntity($client_entity_id);
        $user_details = DB::table('users')->where('customer_id',$user_id)->get();
        $user_information = DB::table('user_archives')->where('user_id',$user_id)->first();
        $state = DB::table('state_masters')->where('id',$user_information->state)->first();
        
        $city = DB::table('city_masters')->where('id',$user_information->city)->first();
        
        return view('user_profile',compact('user_details','user_entity','user_information','countries','state','city'));
    }
    
    
    public function index()
    {   
        
        return $this->get_user_details();
        

    }

    
    public function store_profile_picture(Request $req)
    {
        $user_id = $this->get_user_id();
        $user_name = Auth::user()->name;

        //Store In Storage Folder
        $store = $req->file('profile_picture')->storeAs('public/'.$user_name. '/profile_picture',time().$req->profile_picture->getClientOriginalName());
        $path = $user_name.'/profile_picture/'.time().$req->profile_picture->getClientOriginalName();

        //Update user_archives Table
        DB::table('user_archives')
            ->where('user_id', $user_id )
            ->update(['profile_picture' => $path]);


        return $this->get_user_details();
        
    }

    public function get_state(Request $request)
    {
        $id = $request->input('country_id');
        $state_list = "<option value='0'>Select</option>";
        $city_list = "<option value='0'>Select</option>";
        if ($id!=0) {
            
            $states = CountryMaster::find($id)->states;
            
                foreach ($states as $state) {
                    
                    
                    $state_list .= "<option value='$state->id'>".$state->name."</option>"; 
                }
            
        }
        
        return response()->json(array('state'=> $state_list,'city'=>$city_list), 200);
    }



    public function get_city(Request $request)
    {
        $id = $request->input('state_id');
        $city_list = "<option value='0'>Select</option>";
        if ($id!=0) {
            
            $cities = StateMaster::find($id)->cities;
            
                foreach ($cities as $city) {
                    
                    
                    $city_list .= "<option value='$city->id'>".$city->name."</option>"; 
                }
            
        }
        
        return response()->json(array('city'=> $city_list), 200);
    }


    public function update_user_profile(Request $req)
    {
        $user_id = $this->get_user_id();
        
        DB::table('user_archives')
            ->where('user_id', $user_id )
            ->update(['first_name' => $req->first_name,
                    'middle_name' => $req->middle_name,
                    'last_name' => $req->last_name,
                    'address' => $req->address,
                    'city' => $req->city,'state' => $req->state,
                    'country' => $req->country,
                    'pincode' => $req->pincode,
                    'gender' => $req->gender,
                    'about_me' => $req->about_me,
                    'display_name_preference' => $req->display_name]);
            return $this->get_user_details();
    }

    
}
