<?php

namespace App\model;

use App\model\city_master;
use Illuminate\Database\Eloquent\Model;

class city_master extends Model
{
    public static function find_city_name($id)
    {
        $city = city_master::find($id);
        
        if ($id) {
            return $city->name;
        } else {
            return "";
        }
        
        
    }
}
