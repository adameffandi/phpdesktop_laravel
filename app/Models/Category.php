<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function blog()
    {
        return $this->hasMany('App\Models\Blog');
    }

    public function media()
    {
        return $this->belongsTo('App\Models\Media', 'media_id');
    }
}
