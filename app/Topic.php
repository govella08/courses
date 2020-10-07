<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
  protected $guarded = [];

  public function course ()
  {
    return $this->belongsTo('App\Course');
  }

  public function note() {
    return $this->hasOne('App\Note');
  }
}
