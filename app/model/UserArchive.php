<?php

namespace App\model;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserArchive extends Model
{
    public static function FindUserEntity($id)
    {
        return DB::table('client_entities')->where('id','=',$id)->value('name');
    }

    public static function FindUserEnityByUserID($id)
    {
        $user_entity_id = User::where('customer_id',$id)->first();
        return DB::table('client_entities')->where('id','=',$user_entity_id->client_entity_id)->value('name');
    }
}
