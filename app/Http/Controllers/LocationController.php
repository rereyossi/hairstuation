<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Location;
use App\User;


use Input;
use Validator;
use Redirect;
use Session;
use Auth;

class LocationController extends Controller
{

  public function __construct(){
    $this->middleware('admin', ['except' => ['get_price']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $location = Location::all();

    }

    public function management()
    {
        $locations = Location::all();
        $data['header'] = 'location management';
        return view('location.management',compact('locations'), $data);
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
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
      $locations = Location::all();
      $data['header'] = 'edit location';
      return view('location.edit',compact('locations'), $data);
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
        $location = Location::all();
        $i = 1;
        foreach ($location as $key => $value) {
           $location1 = 'location1_'.$i;
           $location2 = 'location2_'.$i;
           $getid = 'id_'.$i;
           $id = Input::get($getid);

          $location = Location::find($id);
          $location->location1       = Input::get($location1);
          $location->location2      = Input::get($location2);
          $location->update();
          $i++;
        }
        return redirect('location/management/')->with('message', 'You have done successfully');

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

    public function get_price(){
      $country = Input::get('country');
      $location = Input::get('location');
      $price = Location::where('country', '=', $country)->first();

      if ($location == 'location1') {
        $total = $price->location1;
      }else{
        $total = $price->location2;
      }

      echo json_encode($total);
    }
}
