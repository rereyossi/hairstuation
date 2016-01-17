<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $table = 'images';
  //  protected $fillable = [
  //      'title',
  //      'desc',
  //      'file'
  //  ];

   public function product()
   {
    return $this->belongsTo('App\Product', 'id_product');
   }
}
