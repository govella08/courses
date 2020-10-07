<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
  public function topic() {
    return $this->belongsTo('App\Topic');
  }
}
