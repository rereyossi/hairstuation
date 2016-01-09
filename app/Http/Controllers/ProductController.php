<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Controllers\ImageController as Img_control;
use App\Product;
use App\Image as Img_model;
use App\User;
use File;

use Input;
use Validator;
use Redirect;
use Session;
use Auth;



/*
- create ProductController

 */
class ProductController extends Controller
{

    public function __construct(){
      $this->middleware('superadmin', ['except' => ['management','grooming', 'index', 'show']]);
      $this->middleware('admin', ['only' => ['management']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $products = Product::where('category', '=', 'styling')->with(['image' => function ($query) {
          $query->where('img_status', '=', 'display');
      }])->orderBy('id','desc')->get();
      $data['header'] = 'styling product';
      return view('product.index',compact('products'), $data);

    }

    public function grooming(){
      $products = Product::where('category', '=', 'grooming')->with(['image' => function ($query) {
          $query->where('img_status', '=', 'display');
      }])->orderBy('id','desc')->get();
      $data['header'] = 'grooming product';
      return view('product.index',compact('products'), $data);
    }


    public function management()
    {


        $products = Product::with(['image' => function ($query) {
            $query->where('img_status', '=', 'display');
        }])->orderBy('id','desc')->get();
        $data['header'] = 'product management';

        return view('product.management',compact('products'), $data);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
      if (empty($id)) {
        $data['header'] = 'new product';
        return view('product.create',$data);
      }else{
        $product = Product::find($id);
        $images = Img_model::where('id_product', '=', $id)->get();
        $data['header'] = 'new product';
        return view('product.create',compact('product', 'images'), $data);
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
            'price' => 'required',
        ]);


      if ($validator->fails()) {
        if (!empty($id)) {
          return Redirect::to('product/create/'.$id)->withErrors($validator)->withInput();
        }else{
          return Redirect::to('product/create')->withErrors($validator)->withInput();
        }
      }else {
        if (!empty($id)) {
          $product = Product::find($id);
        }else{
          $product = new Product;
        }
        $product->product_name       = Input::get('product_name');
        $product->color       = Input::get('color');
        $product->desc                = Input::get('desc');
        $product->price               = Input::get('price');
        $product->category             = Input::get('category');
          if (empty($id)) {
            $product->rating              = 1;
            $product->save();
            $last_id = $product->id;

          }else{
            $product->update();
            $last_id = $id;
          }

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

        $product = Product::with('image', 'comment')->find($id);
        $pcount = $product->count + 1;

        if($pcount <= 10):
          $rating= 1;
          elseif($pcount > 10 && $pcount <=20):
            $rating= 2;
            elseif($pcount > 20 && $pcount <=30):
              $rating= 3;
              elseif($pcount > 30 && $pcount <=40):
                $rating= 4;
                elseif($pcount > 40):
                  $rating= 5;
                  endif;

        $relateds = Product::where('category', '=', $product->category)->with('image')->paginate(3);


        $products = Product::find($product->id);
        $products->count = $product->count+1;
        $products->rating = $rating;
        $products->update();





        return view('product.detail',compact('product', 'relateds'));
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
      $images = Img_model::where('id_product', '=', $id)->get();
      foreach ($images as $key => $image) {
        File::delete('uploads/images/original/'.$image->filename);
        File::delete('uploads/images/medium/'.$image->filename);
        File::delete('uploads/images/small/'.$image->filename);
        Img_model::find($image->id)->delete();
      }
      return redirect('product/management')->with('message', 'delete successfully');
    }
}
