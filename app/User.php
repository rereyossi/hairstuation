<?php

namespace App;

use DB;
use Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function transaction(){
       return $this->belongsToMany('App\Transaction', 'order', 'id_user', 'id_transaction');
   }

   public function product(){
      return $this->belongsToMany('App\Product', 'order', 'id_user', 'id_product');
    }

   public function group(){
        return $this->belongsToMany('App\Group', 'pivot_users', 'id_group', 'id_user');
   }

   public function profile(){
        return $this->hasMany('App\profile', 'id_user');
   }


   public static function set_group($data = array()){
       $order = DB::table('pivot_users')
               ->insert($data);
   }

   public  static function is_admin(){
       $user = Auth::user();
       if($user):
       $group = DB::table('pivot_users')
               ->where('id_user', $user->id)
               ->first();
        if ($group->id_group == 1) {
          return true;
        }
        return false;
      endif;
   }



}
