<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
  protected $guarded = [];

  public function student() {
    return $this->belongsTo('App\Student');
  }
}
