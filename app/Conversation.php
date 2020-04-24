<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $dateFormat = 'Y-m-d';

    protected $casts = [
    'created_at'  => 'date:Y-m-d',
    ];

    public function lastMessage()
    {
      return $this->hasOne('App\Message')->latest();
    }
    public function Message()
    {
      return $this->hasMany('App\Message');
    }


}
