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


class TransactionController extends Controller
{

  // public function __construct(){
  //   $this->middleware('admin', ['management', 'create', 'store', 'edit', 'update', 'destroy']);
  // }


    public function management(){
      $transactions = Transaction::with(['user' => function ($query) {
          $query->first();
      }])->get();
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
      $order = Transaction::get_order($id);
      $id_product = $order->id_product;
      $id_user = $order->id_user;


      $transaction = Transaction::where('id', '=', $id)->with(['user' => function ($query) {
          $query->first();
      }])->first();
      $products = Transaction::get_product($id);
      $profile = Profile::where('id_user', '=', $id_user)->first();
      $data['header'] = 'transaction detail';
      return view('transaction.detail',compact('transaction', 'products', 'profile'), $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function subscribe(){
        // $date = date('d');
        // $mount = 6;
        //
        // if ($mount == 2 || $mount == 4 || $mount == 6 || $mount == 8|| $mount == 10 || $mount == 12) {
        //   echo '2';
        // }elseif ($mount%3 == 0 && $mount%6 != 0 && $mount%6 != 0 ) {
        //   echo '3';
        // }elseif ($mount%4 == 0) {
        //   echo '4';
        // }elseif ($mount%5 == 0) {
        //   echo '5';
        // }elseif ($mount%6 == 0) {
        //   echo '6';
        // }else{
        //   echo "1";
        // }

        // $user = new User();
        // print_r($user->is_admin());

    }


    public function send_mail()
    {
      // Variable data ini yang berupa array ini akan bisa diakses di dalam "view".
      $data = ['prize' => 'Peke', 'total' => 3 ];

      // "emails.hello" adalah nama view.
        Mail::send('email.tes_mail', $data, function ($mail)
      {
        // Email dikirimkan ke address "momo@deviluke.com"
        // dengan nama penerima "Momo Velia Deviluke"
        $mail->from('hello@hairstuation.com', 'Learning Laravel');

        $mail->to('rereyossi@gmail.com', 'rereyossi');

        // Copy carbon dikirimkan ke address "haruna@sairenji"
        // dengan nama penerima "Haruna Sairenji"
        $mail->cc('deddavinci99@gmail.com', 'Haruna Sairenji');

        $mail->subject('Hello World!');
      });

    }


    public function send_order($id){

      $order = Transaction::get_order($id);
      $id_product = $order->id_product;
      $id_user = $order->id_user;


      $transaction = Transaction::where('id', '=', $id)->with(['user' => function ($query) {
          $query->first();
      }])->first();
      $products = Transaction::get_product($id);
      $profile = Profile::where('id_user', '=', $id_user)->first();


      return view('email.send_order',compact('transaction', 'products', 'profile'));

    }
}
