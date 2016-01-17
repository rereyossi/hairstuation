<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
  protected $table = 'comments';

  public function product(){
     return $this->belongsTo('App\Product', 'id_product');
 }

}
