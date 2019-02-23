<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function media()
    {
        return $this->belongsTo('App\Media', 'media_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function homepagetag()
    {
        return $this->belongsTo('App\HomepageTag', 'homepage_tag_id');
    }

    public function content_status()
    {
        return $this->belongsTo('App\ContentStatus', 'content_status_id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
