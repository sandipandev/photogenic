<?php

namespace App\Http\Controllers;

use App\model\BioData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
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
        $user_biodata = BioData::where('customer_id',Auth::user()->customer_id)->first();
        //return $user_biodata;
        return view('biodata',compact('user_details','user_biodata'));

    }

    public function store(Request $request)
    {
        $UpdateBioData = BioData::where('customer_id', '=',  $request->customer_id)->first();
        $UpdateBioData->first_name = $request->first_name;
        $UpdateBioData->middle_name = $request->middle_name;
        $UpdateBioData->last_name = $request->last_name;
        $UpdateBioData->dob = $request->dob;
        $UpdateBioData->gender = $request->gender;
        $UpdateBioData->address = $request->address;
        $UpdateBioData->contact_no_1 = $request->contact_no_1;
        $UpdateBioData->contact_no_2 = $request->contact_no_2;
        $UpdateBioData->email_address = $request->email_address;
        $UpdateBioData->weight = $request->weight;
        $UpdateBioData->weight_unit = $request->weight_unit;
        $UpdateBioData->height = $request->height;
        $UpdateBioData->height_unit = $request->height_unit;
        $UpdateBioData->hair_length = $request->hair_length;
        $UpdateBioData->complexion  = $request->complexion ;
        $UpdateBioData->breast_size  = $request->breast_size ;
        $UpdateBioData->breast_unit = $request->breast_unit;
        $UpdateBioData->waist = $request->waist;
        $UpdateBioData->waist_unit = $request->waist_unit;
        $UpdateBioData->hips = $request->hips;
        $UpdateBioData->hips_unit = $request->hips_unit;
        $UpdateBioData->body_pattern = $request->body_pattern;
        $UpdateBioData->tatto = $request->tatto;
        $UpdateBioData->marital_status = $request->marital_status;
        $UpdateBioData->skin_tone = $request->skin_tone;
        $UpdateBioData->shoe_size = $request->shoe_size;
        $UpdateBioData->show_size_unit = $request->show_size_unit;
        $UpdateBioData->eye_color = $request->eye_color;
        $UpdateBioData->hair_color = $request->hair_color;
        $UpdateBioData->dress_comfortable = $request->dress_comfortable;
        $UpdateBioData->bridal_shoot = $request->bridal_shoot;
        $UpdateBioData->western_shoot = $request->western_shoot;
        $UpdateBioData->body_paint_shoot = $request->body_paint_shoot;
        $UpdateBioData->designer_shoot = $request->designer_shoot;
        $UpdateBioData->ethnic_wear = $request->ethnic_wear;
        $UpdateBioData->western_wear = $request->western_wear;
        $UpdateBioData->bikini = $request->bikini;
        $UpdateBioData->lingeries = $request->lingeries;
        $UpdateBioData->swim_suits = $request->swim_suits;
        $UpdateBioData->calender_shoot = $request->calender_shoot;
        $UpdateBioData->video_shoot = $request->video_shoot;
        $UpdateBioData->nude = $request->nude;
        $UpdateBioData->semi_nude = $request->semi_nude;
        $UpdateBioData->bridal = $request->bridal;
        $UpdateBioData->sharee = $request->sharee;
        $UpdateBioData->compromise = $request->compromise;
        $UpdateBioData->smoking = $request->smoking;
        $UpdateBioData->drinking = $request->drinking;
        $UpdateBioData->acting = $request->acting;
        $UpdateBioData->music_album = $request->music_album;
        $UpdateBioData->short_film = $request->short_film;
        $UpdateBioData->secondary_education = $request->secondary_education;
        $UpdateBioData->higher_secondary_education = $request->higher_secondary_education;
        $UpdateBioData->graduation = $request->graduation;
        $UpdateBioData->post_graduation = $request->post_graduation;
        $UpdateBioData->education_others = $request->education_others;
        $UpdateBioData->present_profession = $request->present_profession;
        $UpdateBioData->working_experience = $request->working_experience;
        $UpdateBioData->designation = $request->designation;
        $UpdateBioData->save();
        return view('biodata');
    }
}
