<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExampleUser extends Model
{
    protected $table ='exampleuser';
    // protected $fillable;

    public function rights()
    {
      return $this->belongsToMany('App\Right','exampleusers_rights','user_id')->where('exampleusers_rights.has','=',1);
    }
    public function setRights($arrayOfRights=null)
    {
      if($arrayOfRights == null)
      {
        $rights = \App\Right::all();
        foreach($rights as $right)
        {
          \DB::table('exampleusers_rights')->updateOrInsert(
            ['user_id' => $this->id, 'right_id' => $right->id],
            ['has' => 0]

          );
        }
      }
      else
      {
        $rightToSetNull = \App\Right::WhereNotIn('name',$arrayOfRights)->get();

        foreach($rightToSetNull as $right)
        {
          \DB::table('exampleusers_rights')->updateOrInsert(
            ['user_id' => $this->id, 'right_id' => $right->id],
            ['has' => 0]

          );
        }
        foreach($arrayOfRights as $rightname)
        {
          $rightToUpdate = \App\Right::where('name','=',$rightname)->first();


          \DB::table('exampleusers_rights')->updateOrInsert(
            ['user_id' => $this->id, 'right_id' => $rightToUpdate->id],
            ['has' => 1]
          );

        }
      }

    }
}
