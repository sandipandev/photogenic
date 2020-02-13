<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\model\UserArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
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

    public function redirectToProvider(Request $request)
    {
        
        $value = $request->as;
        
        $request->session()->put('as', $value);

        


        $provider = 'google';
        return Socialite::driver('google')
                        ->with(['as'=>$value])
                        ->redirect();
        
    }

    public function handleProviderCallback(Request $request)
    {
        try {
            $as = $request->session()->get('as');
            
            $user = Socialite::driver('google')->stateless()->user();
            
        
            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                
                Auth::loginUsingId($finduser->id);


                return redirect('/home');

            }else{
                $customer_id = $this->gen_customer_id();
                
                $newUser = User::create([
                    
                    'customer_id' => $customer_id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'client_entity_id'=> $as,
                    'confirmed' => true,
                ]);

                $user_profile = new UserArchive();
                $user_profile->user_id = $customer_id;
                
                $user_profile->email_id = $user->email;
                $user_profile->save();
  
                Auth::login($newUser);
                
                return redirect()->back();
            }
  
        } catch (Exception $e) {
            return redirect('login/google');
        }
    }
}
