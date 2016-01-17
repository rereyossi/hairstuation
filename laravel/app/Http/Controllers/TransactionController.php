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
      $transactions = Transaction::with('user')->orderBy('id', 'desc')->where('subsribe_status', 'regular')->get();
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
        $date =  date('d');
        $mount = date('m');

        //find transaction dengan tanggal hari ini
        $transactions =  Transaction::where(DB::raw("DAY(date)"), '=',$date)->get();
        // find product subscribe
        foreach($transactions as $transaction):
          if($transaction->subsribe_status == 'active'):
              if($mount%$transaction->subsribe == 0):
                // get data subsribe
                $transaction = Transaction::where('id', '=', $transaction->id)->with('user')->first();

                $id_user = $transaction->id_user;
                $products = Transaction::get_product($transaction->id);
                $profile = Profile::where('id_user', '=', $id_user)->first();
                // end get data subsribe

                // mail send subsribe
                $data = array(
                  'email' => $profile->email,
                  'from' => 'hallo@hairstuation.com',
                  'name' => $profile->firstname.' '.$profile->lastname,
                  'subs_shipping' => $transaction->shipping,
                  'subs_subtotal'=> $transaction->subtotal,
                  'subs_total'=> $transaction->total,
                );
                Mail::send( 'email.transaction.subsribe', compact('transaction', 'products', 'profile'), function( $message ) use ($data)
                {
                    $message->to( $data['email'] )->from( $data['from'], $data['name'] )->subject( 'hairstuation.com: order product' );
                });
                // end mail send subsribe

              endif;
          endif;
        endforeach;

    }

    public function show_subsribe($id)
    {

      $transaction = Transaction::where('id', '=', $id)->with('user')->first();

      $id_user = $transaction->id_user;
      $products = Transaction::get_product($transaction->id);
      $profile = Profile::where('id_user', '=', $id_user)->first();

      $data['header'] = 'subribe detail';
      return view('transaction.detail_subsribe',compact('transaction', 'products', 'profile'), $data);

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
