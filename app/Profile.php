<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
      protected $table = 'meta_users';

      public function profile(){
         return $this->hasMany('App\Profile');
     }
}
