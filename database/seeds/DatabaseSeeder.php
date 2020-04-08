<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RightsSeeder::class);
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
