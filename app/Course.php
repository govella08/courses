<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;

class Course extends Model
{
  protected $guarded = [];

  public function department ()
  {
    return $this->belongsTo(Department::class);
  }

  public function topics ()
  {
    return $this->hasMany('App\Topic');
  }

  public function batches ()
  {
    return $this->hasMany('App\Batch');
  }
}
