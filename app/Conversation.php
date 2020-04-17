<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function lastMessage()
    {
      return $this->hasOne('App\Message')->latest();
    }
    public function Message()
    {
      return $this->hasMany('App\Message');
    }
}
