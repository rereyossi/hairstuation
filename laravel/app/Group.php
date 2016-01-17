<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
      protected $table = 'group_users';

      public function User(){
         return $this->belongsToMany('App\User', 'pivot_users', 'id_group', 'id_user');
     }
}
