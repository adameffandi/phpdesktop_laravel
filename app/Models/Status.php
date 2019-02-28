<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  protected $table = 'statuses';

  public function user()
  {
      return $this->hasMany('App\Models\User');
  }

  public function blog()
  {
      return $this->hasMany('App\Models\Blog');
  }
}
