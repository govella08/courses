<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $guarded = [];

  public function course ()
  {
    return $this->belongsTo('App\Course');
  }
  
  public function students ()
  {
    return $this->belongsToMany('App\Student');
  }

  public function users () {
    return $this->belongsToMany('App\User');
  }

  // HELPER FUNCTION (CHECK (TICK) ALL THE STUDENTS IN THIS BATCH)
  public function hasAnyStudent ($student) {
    if ($this->students()->where('first_name', $student)->first()) {
      return true;
    }
    return false;
  }

  public function hasAnyTeacher ($name) {
    if($this->users()->where('name', $name)->first()) {
      return true;
    }
    return false;
  }
}
