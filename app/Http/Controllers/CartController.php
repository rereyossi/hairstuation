<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Cart as Mcart;
use App\Transaction;

use Validator;
use Input;
use Session;
use Redirect;
use Cart;




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

      return view('cart.index',compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

      $qty = Input::get('qty');
      $subs = Input::get('subs');
      $product = Product::find($id);

        $data = array(
          'id'           => $product->id,
          'name'         => $product->product_name,
          'qty'          => $qty,
          'price'        => $product->price,
          'options'      => array(
                              'subs'  => $subs,
                            ),
         );


        Cart::add($data);

        $cart = Cart::content(); //show all cart

        return redirect('cart/view/')->with('message', $product->product_name.' success add to cart');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
      $formid       = str_random();
      $cart_content = Cart::content();

        foreach ($cart_content as $cart){

          $transaction  = new Transaction();

          $product = Product::find($cart->id);

          $transaction->date     = 12;
          $transaction->code     = $formid;
          $transaction->qty      = $cart->qty;
          $transaction->subribe     = $cart->qty;
          $transaction->total     = $cart->price * $cart->qty;
          $transaction->id_product  = $cart->id;
          $transaction->id_user  = 1;


          $transaction->save();
        }

        Cart::destroy();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
      $cart = Cart::content()->toArray();

      foreach ($cart as $key => $value) {
        echo $value['id'];
      }
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
