<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Message extends Model
{
  protected $casts = [
  'created_at'  => 'date:d.m.Y',
  ];
  protected $appends = ['decrypted_message'];

  public function getDecryptedMessageAttribute()
    {
      // dd($this->message);
      try {
            $decrypted = Crypt::decryptString($this->message);

          } catch (Throwable $e) {
              echo "Captured Throwable: " . $e->getMessage() . PHP_EOL;
          }

        return ($decrypted);
    }
}
