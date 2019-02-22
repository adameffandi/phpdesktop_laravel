<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  protected $table = 'medias';

  public function user()
  {
      return $this->belongsTo('App\User', 'uploader_id');
  }

  public function blog()
  {
      return $this->hasMany('App\Media');
  }
}
