<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Product;

use Input;
use Validator;
use Redirect;
use Session;
use Auth;


class CommentController extends Controller
{

  public function __construct(){
    $this->middleware('admin', ['except' => ['create', 'store', 'show']]);
  }

    public function management(){
      if(Auth::user()){
        $comments = Comment::with('product')->get();
        $data['header'] = 'comment management';
        return view('comment.management',compact('comments'), $data);
      }else{
        return redirect('/')->with('message', 'you must login to open this page');
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Auth::user()){
        return view('comment.create');
      }{
        return redirect('/')->with('message', 'you must login to open this page');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
          'email' => 'required',
          'name' => 'required',
          'comment' => 'required',
        ]);


        if ($validator->fails()) {
            return Redirect::to('product/detail/'.$id)->withErrors($validator)->withInput();
        }else {
          $comment = new Comment;
          $comment->name       = Input::get('name');
          $comment->email      = Input::get('email');
          $comment->comment    = Input::get('comment');
          $comment->rating    = Input::get('rating');
          $comment->id_product = $id;
          $comment->save();
          return redirect('product/detail/'.$id)->with('message', 'You have done successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $id = 2;
      $comments = Comment::where('id_product', '=', $id)->get();
      return view('comment.index',compact('comments'));

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
      if(Auth::user()){
      Comment::find($id)->delete();
      return redirect('comment/management')->with('message', 'delete successfully');
    }else{
      return redirect('/')->with('message', 'you must login to open this page');
    }
    }


}
