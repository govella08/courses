<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Department::truncate();
    Department::create([
      'code'  => 'ICT',
      'name'  => 'Information and Communication Technology'
    ]);
    Department::create([
      'code'  => 'MEC',
      'name'  => 'Mechanical Engineering'
    ]);
    Department::create([
      'code'  => 'AE',
      'name'  => 'Automotive Engineering'
    ]);
    Department::create([
      'code'  => 'E',
      'name'  => 'Electrical Engineering'
    ]);
    Department::create([
      'code'  => 'GS',
      'name'  => 'General Studies'
    ]);
    Department::create([
      'code'  => 'CIV',
      'name'  => 'Civil Engineering'
    ]);
  }
}
