<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class StateMaster extends Model
{
    public function cities()
    {
        return $this->hasMany('App\model\city_master');
    }
}
