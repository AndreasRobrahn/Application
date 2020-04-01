<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function indexConfig()
    {
      return view('backend.ConfigIndex');
    }
    public function migrate()
    {
      \Artisan::call('migrate');
      return redirect()->back();
    }
    public function migrateResetTable()
    {

      $process = \Artisan::call('migrate:reset');
      \Artisan::call('migrate');
       // return $process;
      if($process == 0)
      {
        return 1;
      }
      else {
        return 'table resettet';
      }

      // return redirect()->back();
    }
    public function truncateAll()
    {
      $truncatetablesAll = array(
        'conversations',
        'messages',
      );

      foreach($truncatetablesAll as $table)
      {
        \DB::table($table)->truncate();
      }
      return redirect()->back();

    }
}
