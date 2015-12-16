<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Controllers\ImageController as Img;
use App\Product;

use Input;
use Validator;
use Redirect;
use Session;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();

      return view('product.index',compact('products'));

    }

    public function management()
    {
      $user = Auth::user()->toArray();
      var_dump($user);
      if (Auth::check()):
        $products = Product::all();

        return view('product.management',compact('products'));
      endif;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
      if (empty($id)) {
        return view('product.create');
      }else{
        $image = new Img;
        $image->upload($id);
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {

      $validator = Validator::make($request->all(), [
            'product_name' => 'required',
        ]);


      if ($validator->fails()) {
          return Redirect::to('product/create')->withErrors($validator)->withInput();
      }else {
        $product = new Product;
        $product->product_name       = Input::get('product_name');
        $product->desc                = Input::get('desc');
        $product->price               = Input::get('price');
        $product->status               = Input::get('status');
        $product->save();
        $last_id = $product->id;


        return redirect('product/create/'.$last_id)->with('message', 'You have done successfully');
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

        $product = Product::find($id);
        return view('product.detail',compact('product'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Product::find($id)->delete();
      return redirect('product/management')->with('message', 'delete successfully');
    }
}
