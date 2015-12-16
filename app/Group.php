<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
      protected $table = 'group_users';

      public function User(){
         return $this->hasMany('App\User');
     }
}
