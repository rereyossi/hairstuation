<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;

use Input;
use Validator;
use Image as Img;
use File;
use Redirect;
use Session;

class ImageController extends Controller
{


    public function upload($id=null){
      $images = Image::orderBy('id', 'DESC')->get();
      if(isset($id)):
        return redirect('image/upload/'.$id);
      else:
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
      $images = Image::all();
      return view('image.management', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
              'title' => 'required',
        ]);

        if ($validator->fails()) {
          return Redirect::to('image/upload')->withInput()->withErrors($validator);
        }else{
          $file   = Input::file('file');
          $title  = Input::get('title');
          $desc   = Input::get('desc');

          if (!$file->isValid()) {
            return redirect('image/upload')->with('warning', 'You have done fails');
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

            Img::make($path_original.$filename)->resize(300, 9999)->save($path_medium.$filename);
            Img::make($path_original.$filename)->resize(80, 80)->save($path_small.$filename);


            // save database
            if (isset($id)) {
              $images->id_product = $id;
            }
            $images->filename = $filename;
            $images->title = $title;
            $images->desc = $desc;
            $images->path = 'public/uploads/images/';
            $images->save();

            return redirect('image/upload')->with('message', 'You have done successfully');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $book=Book::find($id);
       return view('books.edit',compact('book'));
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
      $bookUpdate=Request::all();
$book=Book::find($id);
$book->update($bookUpdate);
return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Image::find($id)->delete();
          return redirect('image/upload')->with('message', 'delete successfully');

    }
}
