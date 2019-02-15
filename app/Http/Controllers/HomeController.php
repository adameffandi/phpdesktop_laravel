<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;
use DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('home', compact('users'));
    }

    public function createUser(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
      ]);

      if ($validator->fails()) {
          return redirect()->route('home')->withErrors($validator)->withInput();
      }

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();

      Session::flash('success', 'User successfully created!');
      return redirect()->route('home');
    }

    public function editUser(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255',
      ]);

      if ($validator->fails()) {
          return redirect()->route('home')->withErrors($validator)->withInput();
      }

      $user = User::find($id);
      if (isset($user)) {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        Session::flash('success', 'User information successfully updated!');
      } else {
        Session::flash('fail', 'User information could not be updated!');
      }
      return redirect()->route('home');
    }

    public function deleteUser(Request $request, $id)
    {
      $user = User::find($id);
      if (isset($user)) {
        $user->delete();
        Session::flash('success', 'User successfully deleted');
      } else {
        Session::flash('fail', 'User could not be deleted');
      }
      return redirect()->route('home');
    }
}
