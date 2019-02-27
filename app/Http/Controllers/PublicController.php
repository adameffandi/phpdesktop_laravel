<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use App\Models\User;
use App\Models\Role;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\ContentStatus;
use App\Models\HomepageTag;

class PublicController extends Controller
{
    public function index()
    {
      $categories = Category::where('id', '!=', 1)->where('id', '!=', 2)->take(5)->get();
      $blogs = Blog::where('content_status_id', 1)->get();
      $blog_trending_main = Blog::where('id', '!=', 1)->where('homepage_tag_id', 4)->inRandomOrder()->take(1)->first();
      // dd($blog_trending_main);
      $blog_trending_ones = Blog::where('id', '!=', 1)->where('homepage_tag_id', 4)->where('id', '!=', $blog_trending_main->id)->inRandomOrder()->take(2)->get();
      $id_exist = $blog_trending_ones->pluck('id');
      $blog_trending_twos = Blog::where('id', '!=', 1)->where('homepage_tag_id', 4)->where('id', '!=', $blog_trending_main->id)->whereNotIn('id', $id_exist)->inRandomOrder()->take(2)->get();

      return view('welcome', compact('categories', 'blogs', 'blog_trending_main', 'blog_trending_ones', 'blog_trending_twos'));
    }

    public function userLogin(Request $request)
    {
      $userexist = User::where('email', $request->email)->first();

      if ($userexist) {
        if ($userexist->status_id == 1) {
          $userdata = array(
              'email'     => $request->email,
              'password'  => $request->password
          );
          if ($userexist->role_id == 1) {
            if (Auth::attempt($userdata)) {
              return redirect()->route('home');
            }
          } else {
            if (Auth::attempt($userdata)) {
              return redirect()->route('user');
            }
          }
        }
        Session::flash('fail', 'We could not log you in for the moment. Please contact our customer support');
        return redirect()->route('landing');
      }

      Session::flash('fail', 'We could not find your records in our database. Please register first.');
      return redirect()->route('landing');
    }

    public function logout2()
    {
      Auth::logout();
      return redirect()->route('landing');
    }
}
