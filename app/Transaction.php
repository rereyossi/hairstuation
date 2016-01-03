<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class transaction extends Model
{
    protected $table = "transactions";

    // public function transUser(){
    //   $transaction =DB::table($this->table)
    //             ->join('products', 'transactions.id_product', '=', 'products.id')
    //             ->join('users', 'transactions.id_user', '=', 'users.id')
    //             ->select('*')
    //             ->get();
    //   return $transaction;
    // }

    public static function get_user($id){
        $transaction = DB::table('order')
                ->where('id_transaction', '=', $id)
                ->get();
        $id_user = $transaction->id_user;
        return $id_user;
    }

    public static function insert_order($data = array()){
        $order = DB::table('order')
                ->insert($data);
    }

    public static function get_order($id){
        $order = DB::table('order')
                ->where('id_transaction', '=', $id)
                ->select('id', 'id_transaction', 'id_product', 'id_user')
                ->first();

        return $order;
    }

    public static function get_product($id){
        $product = DB::table('order')
                ->join('products', 'order.id_product', '=', 'products.id')
                ->where('id_transaction', '=', $id)
                ->get();

        return $product;
    }
    public static function get_subs($id, $subs){
        $product = DB::table('order')
                ->join('products', 'order.id_product', '=', 'products.id')
                ->where('id_transaction', '=', $id)
                ->where('subsribe', '=', $subs)
                ->get();

        return $product;
    }
    public function user()
    {
      return $this->belongsToMany('App\User', 'order', 'id_transaction', 'id_user');
    }

    public function product()
    {
      return $this->belongsToMany('App\Product', 'order', 'id_transaction', 'id_product');
    }
}
