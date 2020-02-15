<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = ['archive_title', 'archive_description','archive_image_link'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
