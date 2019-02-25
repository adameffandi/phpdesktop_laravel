<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentStatus extends Model
{
    protected $table = 'content_status';

    public function blog()
    {
        return $this->hasMany('App\Models\Blog');
    }
}
