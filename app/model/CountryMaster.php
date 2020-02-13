<?php

namespace App\model;

use App\model\StateMaster;
use Illuminate\Database\Eloquent\Model;

class CountryMaster extends Model
{
    public function states()
    {
        return $this->hasMany('App\model\StateMaster');
    }
}
