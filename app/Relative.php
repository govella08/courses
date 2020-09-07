<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
  protected $guarded = [];

  public function students ()
  {
    return $this->belongsToMany('App\Students');
  }
}
