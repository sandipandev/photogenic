<?php

namespace App\Http\Controllers;

use App\model\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
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
        $user_id = $this->get_user_id();
        //$client_entity_id = Auth::user()->client_entity_id;
        $user_information = DB::table('user_archives')->where('user_id',$user_id)->first();
        
        return view('contact_us',compact('user_information'));
    }
    public function store(Request $request)
    {
        // var_dump($request);
        //return $request->user_name;
        $this->validate($request,[
            'subject'=>'required',
            'message'=>'required'
        ],
        [
            'subject.required'=>'Subject is Mandatory field',
            'message'=>'Message is mandatory field'
        ]);
        $ContactUs = new ContactUs;
        $ContactUs->user_id = $request->user_id;
        $ContactUs->subject = $request->subject;
        $ContactUs->message = $request->message;
        $ContactUs->save();
        
        return redirect()->route('contact_us')->with('message', 'We have received your message!! We will get back to you verry soon!!');
    }
}
