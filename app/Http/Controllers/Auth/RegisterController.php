<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\verifyEmail;
use App\model\UserArchive;
use App\client\client_entity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'as' => ['not_in:0'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    function gen_customer_id()
    {
        $last_customer_id = DB::table('users')->latest()->first();
        
        $year = date('y');
        $month = date('m');
        $day = date('d');
        if ($last_customer_id!='') {
            $actual_increment_part = substr(($last_customer_id->customer_id),4,-2);
            $increment_id = $actual_increment_part+1;
            return $customer_id = $year.$month.sprintf('%06d',$increment_id).$day;
        }
        else{
            return $customer_id = $year.$month."000001".$day; 
        }
    
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $customer_id = $this->gen_customer_id();
        
        $user = User::create([
            'customer_id' => $customer_id,
            'name' => $data['name'],
            'email' => $data['email'],
            'ph_no' => $data['phno'],
            'client_entity_id' => $data['as'],
            'password' => Hash::make($data['password']),
            'OTP' => rand(100000,999999),
        ]);

        $user_profile = new UserArchive();
        $user_profile->user_id = $customer_id;
        $user_profile->email_id = $data['email'];
        $user_profile->save(); 

        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);
        return $user;
    }

    public function sendEmail($thisUser)
    {
        Cache::put(['OTP'=>$thisUser['OTP']],now()->addMinutes(5));
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmailFirst()
    {
        return view('email.verifyEmailFirst');
    }


    public function showAllClientEntity()
    {
        $client_entities = DB::table('client_entities')
                            ->where([['status', '=', '1']])
                            ->orderBy('serial_number', 'asc')
                            ->get();
        return view('auth.register',compact('client_entities'));
    }
    
}
