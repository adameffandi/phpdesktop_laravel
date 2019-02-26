<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
      $blogs = Blog::all();
      $blog_trending_main = Blog::where('homepage_tag_id', 4)->inRandomOrder()->take(1)->first();
      // dd($blog_trending_main);
      $blog_trending_ones = Blog::where('homepage_tag_id', 4)->where('id', '!=', $blog_trending_main->id)->inRandomOrder()->take(2)->get();
      $id_exist = $blog_trending_ones->pluck('id');
      $blog_trending_twos = Blog::where('homepage_tag_id', 4)->where('id', '!=', $blog_trending_main->id)->whereNotIn('id', $id_exist)->inRandomOrder()->take(2)->get();

      return view('welcome', compact('categories', 'blogs', 'blog_trending_main', 'blog_trending_ones', 'blog_trending_twos'));
    }
}
