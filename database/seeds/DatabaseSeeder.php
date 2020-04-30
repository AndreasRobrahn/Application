<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Userseeder::class);
    }
}

class Userseeder extends Seeder
{
  public function run()
  {
      \DB::table('users')->insert([

        'name' => 'admandiadmindo',
        'email' => 'anno1984@gmx.de',
        'email_verified_at' => now(),
        'created_at' => now(),
        'updated_at' => now(),
        'password' => Hash::make('test123exampleuser')
      ]);
    }
}
class RightsSeeder extends Seeder
{
  public function run()
  {
      $rights = [

        'task1_read',
        'task1_write',
        'task2_read',
        'task2_write',
        'task3_read',
        'task3_write',
      ];

      foreach($rights as $right)
      {
        \DB::table('rights')->updateOrInsert(
          ['name' => $right]
        );
      }
  }
}
