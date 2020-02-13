<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = ['award_title', 'award_description','award_image_link'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
