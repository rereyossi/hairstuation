<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TransactionController as Transac;
#database
use App\Product;
use App\Cart as Mcart;
use App\User;
use App\Transaction;
Use App\Profile;
Use App\Group;
Use App\Location;

use Validator;
use Input;
use Session;
use Redirect;
use Cart;
use Auth;
use DB;
use Mail;





class cartController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cart = Cart::content();
      $count = Cart::count();

      if ($count == 1) {
        $data['cost'] = 5;
      }else{
        $data['cost'] = (2*($count-1))+5;
      }
      return view('cart.index',compact('cart'), $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $product = Product::find($id);

      $qty = Input::get('qty');
      $subs = Input::get('subs');
      if ($subs > 0) {
        $price = $product->price - (15/100*$product->price);
      } else {
        $price = $product->price*$qty;
      }

      $img = Input::get('img');




        $data = array(
          'id'           => $product->id,
          'name'         => $product->product_name,
          'qty'          => $qty,
          'price'        => $price,
          'options'      => array(
                              'subs'  => $subs,
                              'img'  => $img,
                              'old_price' => $product->price,
                            ),
         );


        Cart::add($data);

        $cart = Cart::content(); //show all cart

        return redirect('product/detail/'.$product->id)->with('message', $product->product_name.' success add to cart');


    }


    public function billing()
    {
      $cart = Cart::content();
      $count = Cart::count();;
      $locations = Location::get();

      // get shipping
      if ($count == 1) {
        $data['shipping'] = 5;
      }else{
        $data['shipping'] = (2*($count-1))+5;
      }

      if ($count < 1) {
        return redirect('cart/view')->with('message', 'cart is empty');
      }else{
          return view('cart.billing', compact('cart', 'locations'), $data);
      }

    }


    public function store(Request $request){
      $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            // 'country' => 'required',
            'street' => 'required',
            'email'     => 'required|email|max:255',
            'city' => 'required',
            'state' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
            'shipping' => 'required',
        ]);


      if ($validator->fails()) {
          return Redirect::to('cart/billing')->withErrors($validator)->withInput();
      }else {
        $count        = Transaction::all()->count();
        $formid       = 'hr'.'-'.date('m').date('Y').'-'.($count+1);
        $cart_content = Cart::content();
        $get_subtotal = Cart::total();
        $get_shipping = Input::get('shipping');




        #save user
        $user = new User();
        $user->name = Input::get('firstname').' '.Input::get('lastname');
        $user->email = Input::get('email');
        $user->save();
        $user_id = $user->id;

        #save group
        $group = array(
          'id_user' => $user_id,
          'id_group' => 3,
        );
        User::set_group($group);

         #save profile
        $profile = new profile;
        $profile->id_user  = $user_id;
        $profile->firstname      = Input::get('firstname');
        $profile->lastname       = Input::get('lastname');
        $profile->country = Input::get('country');
        $profile->street = Input::get('street');
        $profile->optionals = Input::get('optionals');
        $profile->email    = Input::get('email');
        $profile->city    = Input::get('city');
        $profile->state    = Input::get('state');
        $profile->postcode = Input::get('postcode');
        $profile->phone   = Input::get('phone');
        $profile->note = Input::get('note');
        $profile->save();
        $profile_id = $profile->id;


        #save transaction
        $transaction  = new Transaction();
        $transaction->date       = date('Y-m-d');
        $transaction->code       = $formid;
        $transaction->subtotal  = $get_subtotal;
        $transaction->shipping   = $get_shipping;
        $transaction->total      = $get_subtotal+$get_shipping;
        $transaction->subsribe   =  0;
        $transaction->id_user   =   $user_id;
        $transaction->save();
        $transaction_id = $transaction->id;

        #save order
        #show all data in cart
        foreach ($cart_content as $cart){

          $data = array(
            'id_transaction' => $transaction_id,
            'id_product' => $cart->id,
            'qty' => $cart->qty,
            'subtotal'=> $cart->subtotal,
          );

          Transaction::insert_order($data);


        }

        #save transaction subsribe
        #save order
        #show all data in cart
        // start count total and price


        foreach ($cart_content as $cart){
          $qty = 0;
          $price_total = 0;
          if ($cart->options->subs > 0) {

            $qty += $cart->qty;
            $price_total += $cart->subtotal;


            // shipping calculate
            if ($qty == 1) {
              $shipping = 5;
            }else{
              $shipping = (2*($qty-1))+5;
            }



            $subsribe  = new Transaction();
            $subsribe->date       = date('Y-m-d');
            $subsribe->code       = $formid.'-'.$cart->options->subs;
            $subsribe->subtotal  = $price_total;
            $subsribe->shipping   = $shipping;
            $subsribe->total      = $price_total+$shipping;
            $subsribe->subsribe = $cart->options->subs;
            $subsribe->id_user   =   $user_id;
            $subsribe->subsribe_status  = 'active';
            $subsribe->save();
            $subsribe_id = $subsribe->id;


          $data = array(
            'id_transaction' => $subsribe_id,
            'id_product' => $cart->id,
            'qty' => $cart->qty,
            'subtotal'=> $cart->subtotal,
          );

          Transaction::insert_order($data);
          }

        }

        // $transac = new Transac();
        // $transac->send_order($transaction_id);
        Cart::destroy();
        return redirect('cart/finish/'.$transaction_id)->with('message', 'You have done successfully');
      }
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

      $transaction = Transaction::with('user')->where('id', '=', $id)->first();
      $id_user = $transaction->id_user;
      $products = Transaction::get_product($id);
      $profile = Profile::where('id_user', '=', $id_user)->first();
      return view('cart.final', compact('profile', 'transaction', 'products'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $carts = Cart::content();

      $index = 1;
      foreach ($carts as $key => $cart) {
        $rowId = $cart->rowid;
        $qty = Input::get('qty_'.$index);
        $subs = Input::get('subs_'.$index);
        if($subs > 0){
            $price = $cart->price - (15/100*$cart->price);
        }else{
            $price = $cart->price;
        }
        $data = array(
                'qty'          => $qty,
                'price'        => $price,
                'options'      => array(
                                    'subs'  => $subs,
                                  ),

              );
          Cart::update($rowId,$data);
          $index++;
        }
      //end foreach carts
      return redirect('cart/view')->with('message', 'item updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {
      Cart::remove($id);
      return redirect('cart/view')->with('message', '1 item deleted');
    }

    public function destroy_all()
    {
      Cart::destroy();
      return redirect('cart/view')->with('message', 'all item deleted');
    }
}
