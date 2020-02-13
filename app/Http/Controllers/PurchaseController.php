<?php

namespace App\Http\Controllers;

use App\model\plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $client_entity_id = Auth::user()->client_entity_id;
        $user_detail = Auth::user();
        $plan = plan::where('client_entity',$client_entity_id)->first();
        return view('purchase',compact('plan','client_entity_id','user_detail'));
    }

    public function createRequest(Request $request)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:test_7fd998d86c2511ba5bfe00ad9c7",
                        "X-Auth-Token:test_f61804a1f680295f5e424960c66"));
        $payload = Array(
            "purpose" => 'Test',
            'amount' => $request->amount,
            'buyer_name' => $request->customer_id,
            'redirect_url' => ' https://heavy-horse-37.localtunnel.me',
            'send_email' => false,
            'webhook' => ' https://heavy-horse-37.localtunnel.me',
            'send_sms' => false,
            'email' => $request->email,
            'allow_repeated_payments' => true
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        $data = json_decode($response,true);
        //var_dump($data);
        return redirect($data['payment_request']['longurl']);
        //echo $response;
    }
}