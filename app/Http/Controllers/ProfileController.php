<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Profile;
use Input;
use Validator;
use Redirect;
use Session;
use Auth;

class ProfileController extends Controller
{

    public function _construct(){
      $user = Auth::user();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function management()
    {


      if (Auth::check()):
        $profiles = Profile::all();

        return view('profile.management',compact('profiles'));
      endif;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
      $user = Auth::user();
      $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'address' => 'required',
        ]);


      if ($validator->fails()) {
          return Redirect::to('profile/create')->withErrors($validator)->withInput();
      }else {
        $profile = new profile;
        $profile->phone          = Input::get('phone');
        $profile->address       = Input::get('address');
        $profile->id_user     = $user->id;
        $profile->save();
        return redirect('profile/management/')->with('message', 'You have done successfully');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {

        $user = Auth::user();
        $profile = Profile::where('id_user', '=', $user->id)->first();
        return view('profile.detail',compact('profile'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      $user = Auth::user();
      $profile = Profile::where('id_user', '=', $user->id)->first();
      return view('profile.edit',compact('profile'));
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
      $user = Auth::user();
      $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'address' => 'required',
        ]);


      if ($validator->fails()) {
          return Redirect::to('profile/edit')->withErrors($validator)->withInput();
      }else {
        $profile = new profile;
        $profile->phone          = Input::get('phone');
        $profile->address       = Input::get('address');
        $profile->id_user     = $user->id;
        $profile->save();
        return redirect('profile/detail')->with('message', 'You have done successfully');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Profile::find($id)->delete();
      return redirect('profile/management')->with('message', 'delete successfully');
    }
}
