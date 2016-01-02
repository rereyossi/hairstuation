<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';


 # product mempunyai banyak comment
 public function comment(){
      return $this->hasMany('App\Comment', 'id_product');
 }

 public function image(){
      return $this->hasMany('App\Image', 'id_product');
 }



 public function transaction()
 {
   return $this->belongsToMany('App\Product', 'order', 'id_product', 'id_transaction', 'id_user');
 }

 public function user()
 {
   return $this->belongsToMany('App\User', 'order', 'id_product', 'id_transaction', 'id_user');
 }



}
