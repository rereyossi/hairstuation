<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;
use App\Product;

use Input;
use Validator;
use Image as Img;
use File;
use Redirect;
use Session;
use Auth;


class ImageController extends Controller
{


    public function upload($id=null){

      if(!empty($id)):
        $images = Image::where('id_product', '=', $id)->orderBy('id', 'DESC')->get();
        $id_product = $id;
        return view('image.upload', compact('images', 'id_product'));
      else:
        $images = Image::orderBy('id', 'DESC')->get();
        return view('image.upload', compact('images'));
      endif;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $images = Image::all();
      return view('image.index', compact('images'));
    }


    public function management()
    {
      if(User::is_admin()){
      $images = Image::all();
      return view('image.management', compact('images'));
    }else{
      return redirect('/')->with('message', 'you must login to open this page');
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
        $images = new Image();

        $validator = Validator::make($request->all(), [
              'file'  => 'required',
              // 'img_title' => 'required',
        ]);

        if ($validator->fails()) {
          if (!empty($id)) {
            return Redirect::to('product/create/'.$id)->withInput()->withErrors($validator);
          }else{
            return Redirect::to('image/upload/'.$id)->withInput()->withErrors($validator);
          }
        }else{
          $file   = Input::file('file');
          $title  = Input::get('img_title');
          $desc   = Input::get('img_desc');

          if (!$file->isValid()) {
            if (!empty($id)) {
                return redirect('product/create'.$id)->with('warning', 'You have done fails');
            }else{
                return redirect('image/upload')->with('warning', 'You have done fails');
            }
          }else{



            $fullname = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $image_name = str_replace('.' . $ext, '', $fullname);
            $filename = $image_name.'.'.$ext;
            //
            $path = public_path('uploads/images/');
            $path_original = public_path('uploads/images/original/');
            $path_medium = public_path('uploads/images/medium/');
            $path_small = public_path('uploads/images/small/');



            $file->move($path_original, $filename); // Move the original one first

            Img::make($path_original.$filename)->resize(400,null,
              function ($constraint) {
                  $constraint->aspectRatio();
              })->save($path_medium.$filename);
              
            Img::make($path_original.$filename)->resize(80, null,
              function ($constraint) {
                  $constraint->aspectRatio();
              })->save($path_small.$filename);


            // save database

            if (!empty($id)) {
              $images->id_product = $id;
            }
            $images->filename = $filename;
            $images->title = $title;
            $images->desc = $desc;
            $images->path = 'public/uploads/images/original/'.$filename;
            $images->save();

            if (!empty($id)) {
              return redirect('product/create/'.$id)->with('message', 'image successfully');
            }else{
                return redirect('image/upload')->with('message', 'You have done successfully');
            }

          }
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
        //
    }


    public function setDisplay($id = null)
    {
      $image = Image::find($id);
      $id_product = $image->id_product;

      $image_rm = Image::where('id_product', '=', $id_product);
      $image_rm->update(array('img_status'=>'gallery'));

      $image_d = Image::find($id);
      $image_d->img_status = 'display';
      $image_d->save();
      return redirect('product/create/'.$id_product)->with('message', 'You have done successfully');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $image = Image::find($id);
          $id_product = $image->id_product;

          $image = Image::find($id);
          File::delete('uploads/images/original/'.$image->filename);
          File::delete('uploads/images/medium/'.$image->filename);
          File::delete('uploads/images/small/'.$image->filename);
          $image->delete();
          if(!empty($id_product)):
            return redirect('product/create/'.$id_product)->with('message', 'delete successfully');
          else:
            return redirect('image/upload')->with('message', 'delete successfully');
          endif;

    }
}
