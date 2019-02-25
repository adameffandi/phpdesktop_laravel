<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  protected $table = 'medias';

  public function user()
  {
      return $this->belongsTo('App\Models\User', 'uploader_id');
  }

  public function blog()
  {
      return $this->hasMany('App\Models\Media');
  }

  public function category()
  {
      return $this->hasMany('App\Models\Media');
  }
}
