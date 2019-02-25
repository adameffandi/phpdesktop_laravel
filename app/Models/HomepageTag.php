<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageTag extends Model
{
    protected $table = 'homepage_tags';

    public function blog()
    {
        return $this->hasMany('App\Models\Blog');
    }
}
