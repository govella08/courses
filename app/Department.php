<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;
class Department extends Model
{
  protected $guarded = [];

  public function courses()
  {
    return $this->hasMany(Course::class);
  }

  public function users ()
  {
    return $this->hasMany('App\User');
  }

  public function documents()
  {
    return $this->hasMany('App\Document');
  }
}
