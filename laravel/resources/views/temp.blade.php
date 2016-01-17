<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Product;
use App\Transaction;
use App\User;
use App\Profile;
use App\Group;

use Validator;
use Input;
use Session;
use Redirect;
use Cart;
use Auth;
use Mail;
use DB;

class TransactionController extends Controller
{

  public function __construct(){
    $this->middleware('admin', ['except' => ['send_order', 'send_mail', 'subscribe']]);
  }


    public function management(){
      $transactions = Transaction::with('user')->orderBy('id', 'desc')->get();
      $data['header'] = 'transaction management';
      return view('transaction.management',compact('transactions'), $data);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $transaction = Transaction::where('id', '=', $id)->with('user')->first();
      $id_user = $transaction->id_user;
      $products = Transaction::get_product($id);
      $profile = Profile::where('id_user', '=', $id_user)->first();
      $data['header'] = 'transaction detail';

      return view('transaction.detail',compact('transaction', 'products', 'profile'), $data);
    }

    public function show_user($id)
    {
      $transaction = Transaction::where('id', '=', $id)->with('user')->first();
      if(empty($transaction->id)):
        return redirect('404');
      else:

      $id_user = $transaction->id_user;
      $products = Transaction::get_product($id);
      $profile = Profile::where('id_user', '=', $id_user)->first();
      $data['header'] = 'transaction detail';

      return view('transaction.detail_user',compact('transaction', 'products', 'profile'), $data);
      endif;
    }

    public function subscribe(){
        $date = date('d');
        $mount = date('m');

        //find transaction dengan tanggal hari ini
        $transactions =  Transaction::where(DB::raw("DAY(date)"), '=',$date)->get();
        // find product subscribe
        foreach($transactions as $transaction):
          $products = Transaction::get_product($transaction->id);
          foreach($products as $product):
            // start subsribe
            // cari product dengan subribe kelipatan
            if($product->subsribe > 0):
              if($mount%$product->subsribe == 0):

              // start mail send subsribe
              $order = Transaction::get_order($transaction->id);
              $id_product = $order->id_product;
              $subs = $product->subsribe;


              $transaction = Transaction::where('id', '=', $transaction->id)->with('user')->first();
              $id_user = $transaction->id_user;
              $products = Transaction::get_subs($transaction->id, $subs);
              $profile = Profile::where('id_user', '=', $id_user)->first();

              // start count total and price
              $qty = 0;
              $price_total = 0;
              foreach($products as $product):
                $qty += $product->qty;
                $price_total += $product->subtotal;
              endforeach;

              // shipping calculate
              if ($qty == 1) {
                $shipping = 5;
              }else{
                $shipping = (2*($qty-1))+5;
              }

              $data = array(
                'email' => $profile->email,
                'from' => 'hallo@hairstuation.com',
                'name' => $profile->firstname.' '.$profile->lastname,
                'subs_shipping' => $shipping,
                'subs_subtotal'=> $price_total,
                'subs_total'=> $price_total+$shipping,
              );
              Mail::send( 'email.transaction.subsribe', compact('transaction', 'products', 'profile'), function( $message ) use ($data)
              {
                  $message->to( $data['email'] )->from( $data['from'], $data['name'] )->subject( 'hairstuation.com: order product' );
              });
              // end mail send subsribe
            endif;
          endif;
            // end subsribe

          endforeach;
        endforeach;

    }

    public function show_subsribe($id)
    {

            // start mail send subsribe
            $order = Transaction::get_order($id);
            if(empty($order->id_transaction) || empty($order->id_product)):
              return redirect('404');
            else:

            // $id_product = $order->id_product;
            $subs = $product->subsribe;


            $transaction = Transaction::where('id', '=', $id)->with('user')->first();
            $id_user = $transaction->id_user;
            $products = Transaction::get_subs($transaction->id, $subs);
            $profile = Profile::where('id_user', '=', $id_user)->first();

            // start count total and price
            $qty = 0;
            $price_total = 0;
            foreach($products as $product):
              $qty += $product->qty;
              $price_total += $product->subtotal;
            endforeach;

            // shipping calculate
            if ($qty == 1) {
              $shipping = 5;
            }else{
              $shipping = (2*($qty-1))+5;
            }

            $data = array(
              'header' => 'subribe detail',
              'subs_shipping' => $shipping,
              'subs_subtotal'=> $price_total,
              'subs_total'=> $price_total+$shipping,
            );

      return view('transaction.detail_subsribe',compact('transaction', 'products', 'profile'), $data);
        endif;
    }


    // public function send_mail()
    // {
    //   $sent = Mail::send('email.tes_mail', array('key' => 'value'), function($message)
    //   {
    //       $message->from('reavinci@gmail.com');
    //       $message->to('rereyossi@gmail.com', 'John Smith')->subject('tes kirim order!');
    //   });
    //
    //   if( ! $sent) dd("something wrong");
    //   dd("send order");
    //
    //
    // }


    public function send_order($id){

      $transaction = Transaction::where('id', '=', $id)->with('user')->first();
      $id_user = $transaction->id_user;
      $products = Transaction::get_product($id);
      $profile = Profile::where('id_user', '=', $id_user)->first();


      $data = array(
        'email' => $profile->email,
        'from' => 'hallo@hairstuation.com',
        'name' => $profile->firstname.' '.$profile->lastname,
      );
      Mail::send( 'email.transaction.order', compact('transaction', 'products', 'profile'), function( $message ) use ($data)
      {
          $message->to( $data['email'] )->from( $data['from'], $data['name'] )->subject( 'hairstuation.com: order product' );
      });

    }
}
