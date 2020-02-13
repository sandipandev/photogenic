<?php

namespace App\Http\Controllers;

use App\model\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function search_menu_items()
    {
        $menus = menu::all();
        return view('includes.sidemenu',compact('menus'));
        

    }
}
