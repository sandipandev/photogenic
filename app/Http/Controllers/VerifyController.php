<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class VerifyController extends Controller
{
    
    public function verify(Request $request)
    {
        
        if (request('OTP')==Cache::get('OTP')) {
            
             DB::table('users')->where('OTP', '=',request('OTP'))->update(['confirmed'=>true,'OTP'=>0]);
            
            return redirect('/login');
            
        }
        else{
            return redirect()->back()->with('message','Wrong OTP!') ;
        }
        
    }
}
