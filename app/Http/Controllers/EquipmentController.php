<?php

namespace App\Http\Controllers;

use App\model\equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        $user_id = Auth::user()->id;
        $equipment = equipment::where('user_id',$user_id)->first();
        return view('equipment',compact('equipment'));
    }

    
    
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        DB::table('equipment')
                ->updateOrInsert(
                ['user_id' => $user_id],
                ['body' => $request->body,'lens' => $request->lens,'gimble' => $request->gimble,'drone' => $request->drone]
            );
            $equipment = equipment::where('user_id',$user_id)->first();
            return view('equipment',compact('equipment'));    
    }
}
