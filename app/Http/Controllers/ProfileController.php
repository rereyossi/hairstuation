<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Profile;
use App\User;
use Input;
use Validator;
use Redirect;
use Session;
use Auth;
use Cart;
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
          // $profiles = profile::with('profile')->get()->toArray();
          // var_dump($profiles);
    }

    public function management()
    {

      if (Auth::user()){
        $profiles = Profile::all();
        return view('profile.management',compact('profiles'));
      };

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'street' => 'required',
            'email' => 'required',
            'city' => 'required',
            'state' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
        ]);


      if ($validator->fails()) {
          return Redirect::to('profile/create')->withErrors($validator)->withInput();
      }else {
        $profile = new profile;
        $profile->firstname      = Input::get('firstname');
        $profile->lastname       = Input::get('lastname');
        $profile->id_country = Input::get('country');
        $profile->street = Input::get('street');
        $profile->optionals = Input::get('optionals');
        $profile->email    = Input::get('email');
        $profile->city    = Input::get('city');
        $profile->state    = Input::get('state');
        $profile->postcode = Input::get('postcode');
        $profile->phone   = Input::get('phone');
        $profile->note = Input::get('note');

        if (!empty($user->id)) {
          $profile->id_user = $user->id;
        }

        $profile->save();
        return redirect('profile/detail/')->with('message', 'You have done successfully');
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
        $profile = Profile::with('user')->where('id_user', '=', $user->id)->first();
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
        $profile = Profile::where('id_user', '=', $user->id)->first();
        $profile->phone          = Input::get('phone');
        $profile->address       = Input::get('address');
        $profile->update();
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
