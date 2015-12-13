<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = "transactions";

    // function transUser(){
      // $transaction =DB::table($this->table)
      //           ->join('product', 'transactions.id_product', '=', 'product.id')
      //           ->join('users', 'transactions.id_user', '=', 'users.id')
      //           ->select('*')
      //           ->get();
    // }
    //
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function product()
    {
      return $this->belongsTo('App\Product');
    }
}
