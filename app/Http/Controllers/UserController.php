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
       return view('user.home');
   }

   public function createProfile(Request $request)
   {
     return redirect()->route('user');
   }

   public function editProfile(Request $request, $id)
   {
     return redirect()->route('user');
   }

   public function deleteProfile(Request $request, $id)
   {
     return redirect()->route('user');
   }

   public function getBlog()
   {
     return view('user.blog');
   }

   public function createBlog(Request $request)
   {
     return redirect()->route('user');
   }

   public function editBlog(Request $request, $id)
   {
     return redirect()->route('user');
   }

   public function deleteBlog(Request $request, $id)
   {
     return redirect()->route('user');
   }

   public function getComment()
   {
     return view('user.comment');
   }

   public function createComment(Request $request)
   {
     return redirect()->route('user');
   }

   public function editComment(Request $request, $id)
   {
     return redirect()->route('user');
   }

   public function deleteComment(Request $request, $id)
   {
     return redirect()->route('user');
   }
}
