<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;




use App\Product;
use App\User;

use Input;
use Validator;
use Redirect;
use Session;
use Auth;
use DB;



class UserController extends Controller
{
  public function __construct(){
    $this->middleware('superadmin', ['only' => ['create','store']]);
    $this->middleware('admin', ['except' => ['login', 'getLogin']]);
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

    public function login(){
        return view('user.login');
    }

    public function getLogin(Request $request){
      $validator = Validator::make($request->all(), [
            'email'     => 'required|email|max:255',
            'password'  => 'required|min:6',
        ]);


      if ($validator->fails()) {
          return Redirect::to('user/login')->withErrors($validator)->withInput();
      }else {
        $email = Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])){
          $user = Auth::user();
          $group = User::get_group($user->id);

          $data['id'] = $user->id;
          $data['name'] = $user->name;
          $data['email'] = $user->email;
          $data['level'] = $group->group_name;
          $data['id_group'] = $group->id_group;

          $session = Session::put('user', $data);
          return redirect('product/management')->with('message', 'welcome in admin dashbord');

        }else{
          return redirect('user/login')->with('message', 'check your email & password');
        }

      }
    }


    public function management(){
      $users = User::with(['group' => function ($query) {
          $query->where('group_name', '=', 'admin');
      }])->orderBy('id','desc')->get();
      $data['header'] = 'user management';
      return view('user.management',compact('users'), $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password'         => 'required|min:6',
            'repassword' => 'required|same:password'
        ]);


      if ($validator->fails()) {
          return Redirect::to('user/create')->withErrors($validator)->withInput();
      }else {
        $user = new User;
        $user->name      = Input::get('firstname').' '.Input::get('lastname');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('password'));
        $user->save();

        $data = array('id_group' => 2, 'id_user'=> $user->id );
        $group = User::set_group($data);

        return redirect('user/management')->with('message', 'new admin success created');
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
      $id = Auth::user()->id;
      $user = User::find($id);
      return view('user.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      $id = Auth::user()->id;
      $user = User::find($id);
      return view('user.edit', compact('user'));
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
      $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
        ]);


      if ($validator->fails()) {
          return Redirect::to('user/edit')->withErrors($validator)->withInput();
      }else {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name  = Input::get('name');
        $user->email = Input::get('email');
        $user->update();


        return redirect('user/detail')->with('message', 'You have done successfully');
      }
    }


    public function logout()
    {
        Session::forget('user');
        return redirect('/')->with('message', 'logout');
    }



    public function password_edit(){
      return view('user.password_edit');
    }

      public function password_update(Request $request){
        $validator = Validator::make($request->all(), [
            'password'         => 'required|min:6',
            'repassword' => 'required|same:password'
          ]);


        if ($validator->fails()) {
            return Redirect::to('user/password_edit')->withErrors($validator)->withInput();
        }else {
          $id = Auth::user()->id;
          $user = User::find($id);
          $user->password  = bcrypt(Input::get('password'));
          $user->update();

          return redirect('user/detail')->with('message', 'You have done successfully');
        }
      }
}
