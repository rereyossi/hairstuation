<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
      protected $table = 'meta_users';

      public function User(){
           return $this->belongsTo('App\User');
      }
}
