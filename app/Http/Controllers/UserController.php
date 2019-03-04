<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\Models\User;
use App\Models\Role;
use App\Models\Status;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\ContentStatus;
use App\Models\HomepageTag;

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
      $user_id = Auth::id();
      $user = User::find($user_id);
      $your_blogs = Blog::where('user_id', $user_id)->where('status_id', 3)->take(3)->get();

      $count_blogs_posted = count(Blog::where('user_id', $user_id)->where('status_id', 3)->get());
      $count_blogs_pending = count(Blog::where('user_id', $user_id)->where('status_id', 4)->get());
      $count_blogs_archived = count(Blog::where('user_id', $user_id)->where('status_id', 5)->get());

      return view('user.home', compact('user', 'your_blogs', 'count_blogs_posted', 'count_blogs_pending', 'count_blogs_archived'));
   }

   public function editProfile(Request $request, $id)
   {
     $user = User::find($id);
     $user->name = $request->name;
     $user->email = $request->email;
     $user->save();

     return redirect()->route('user');
   }

   public function getBlog()
   {
     $blogs = Blog::where('user_id', Auth::id())->get();
     $comments = Comment::all();
     $categories = Category::all();
     $contentstatuses = ContentStatus::all();

     return view('user.blog', compact('blogs', 'comments', 'categories', 'contentstatuses'));
   }

   public function createBlog(Request $request)
   {
     $media_id = app('App\Http\Controllers\MediaController')->saveImage($request, 'blog');

     $blog = new Blog;
     $blog->title = $request->blog_title;
     $blog->content = $request->blog_content;
     $blog->media_id = $media_id;
     $blog->user_id = Auth::id();
     $blog->status_id = 3; //change to 4 if need admin approval
     $blog->category_id = $request->blog_category;
     $blog->homepage_tag_id = 1;
     $blog->content_status_id = $request->blog_content_status;
     $blog->save();

     Session::flash('success', $blog->title. ' blog successfully created!');
     return redirect()->route('user.blog');
   }

   public function editBlog(Request $request, $id)
   {
     $blog = Blog::find($id);

     if (isset($blog)) {
       if ($request->media == null) {
         $blog->title = $request->blog_title;
         $blog->content = $request->blog_content;
         $blog->category_id = $request->blog_category;
         $blog->homepage_tag_id = $request->blog_homepage_tag;
         $blog->content_status_id = $request->blog_content_status;
         $blog->save();
       } else {
         //delete previous media
         app('App\Http\Controllers\MediaController')->deleteImage($blog->media_id);
         //save new media and get its id
         $media_id = app('App\Http\Controllers\MediaController')->saveImage($request, 'blog');

         $blog->title = $request->blog_title;
         $blog->content = $request->blog_content;
         $blog->media_id = $media_id;
         $blog->category_id = $request->blog_category;
         $blog->homepage_tag_id = $request->blog_homepage_tag;
         $blog->content_status_id = $request->blog_content_status;
         $blog->save();
       }

       Session::flash('success', $blog->title. ' blog successfully updated!');
     } else {
       Session::flash('fail', 'Fail to update blog');
     }
     return redirect()->route('user.blog');
   }

   public function deleteBlog(Request $request, $id)
   {
     $blog = Blog::find($id);

     if (isset($blog)) {
       app('App\Http\Controllers\MediaController')->deleteImage($blog->media_id);
       $blog->delete();
       Session::flash('success', $blog->title. ' blog successfully deleted!');
     } else {
       Session::flash('success', 'Fail to delete blog');
     }

     return redirect()->route('user.blog');
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
