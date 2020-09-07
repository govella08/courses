<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  public function relatives ()
  {
    return $this->belongsToMany('App\Relative');
  }

  public function batches ()
  {
    return $this->belongsToMany('App\Batch');
  }

  public function receipts() {
    return $this->hasMany('App\Receipt');
  }
}
