<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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
       return view('home', compact('users'));
   }

   public function createProfile(Request $request)
   {
     return redirect()->route('home');
   }

   public function editProfile(Request $request, $id)
   {
     return redirect()->route('home');
   }

   public function deleteProfile(Request $request, $id)
   {
     return redirect()->route('home');
   }

   public function getBlog()
   {
     return view('home', compact('users'));
   }

   public function createBlog(Request $request)
   {
     return redirect()->route('home');
   }

   public function editBlog(Request $request, $id)
   {
     return redirect()->route('home');
   }

   public function deleteBlog(Request $request, $id)
   {
     return redirect()->route('home');
   }

   public function getComment()
   {
     return view('home', compact('users'));
   }

   public function createComment(Request $request)
   {
     return redirect()->route('home');
   }

   public function editComment(Request $request, $id)
   {
     return redirect()->route('home');
   }

   public function deleteComment(Request $request, $id)
   {
     return redirect()->route('home');
   }
}
