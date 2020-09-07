<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'sex', 'email', 'phone', 'password', 'department_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  public function roles ()
  {
    return $this->belongsToMany('App\Role');
  }

  public function department ()
  {
    return $this->belongsTo('App\Department');
  }

  public function batchs () {
    return $this->belongsToMany('App\Batch');
  }

  public function hasAnyRole($role) {
    return null != $this->roles->where('name', $role)->first();
  }
}
