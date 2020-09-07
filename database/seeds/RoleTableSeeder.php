<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Role::truncate();
    Role::create(['name' => 'admin', 'description' => 'Role']);
    Role::create(['name' => 'coordinator', 'description' => 'Role']);
    Role::create(['name' => 'coed_hod', 'description' => 'Role']);
    Role::create(['name' => 'dept_coordinator', 'description' => 'Role']);
    Role::create(['name' => 'instructor', 'description' => 'Role']);
    Role::create(['name' => 'rector', 'description' => 'Role']);
    Role::create(['name' => 'hod', 'description' => 'Role']);
    Role::create(['name' => 'account', 'description' => 'Role']);
    Role::create(['name' => 'auditor', 'description' => 'Role']);
  }
}
