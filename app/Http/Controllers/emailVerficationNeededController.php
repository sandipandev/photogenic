<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class emailVerficationNeededController extends Controller
{
    
    public function emailVerficationNeeded()
    {
        $x = (Cache::get('OTP'));
        if ($x) {
            return view('email.verifyEmailFirst');
        }
        else{
            
            return view('auth.register');
        }
        //return auth()->user()->email;
    }
}
