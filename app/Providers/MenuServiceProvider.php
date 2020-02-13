<?php

namespace App\Providers;

use App\model\menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            if(Auth::check()){
            $client_entity_id = Auth::user()->client_entity_id;
            //dd($client_entity_id);
            $items = DB::table('menus')->get();
            $menus = [];
            foreach ($items as $item) {
                
                if (in_array($client_entity_id, json_decode($item->accessed_by,true))){
                    
                    array_push($menus,$item);
                }
            }
            
            
            return $view->with('menus',$menus);
            }
        });
        
    }
}
