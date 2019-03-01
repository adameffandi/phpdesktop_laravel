<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $user_id = Auth::id();
        $user = User::find($user_id);
        $your_blogs = Blog::where('user_id', $user_id)->where('status_id', 3)->take(3)->get();

        $total_blogs_posted = count(Blog::where('user_id', $user_id)->where('status_id', 3)->get());
        $total_blogs_active = count(Blog::where('status_id', 3)->get());
        $total_user_active = count(User::where('status_id', 1)->get());
        $total_user_blocked = count(User::where('status_id', 2)->get());

        return view('admin.home', compact('user', 'your_blogs', 'total_blogs_posted', 'total_blogs_active', 'total_user_active', 'total_user_blocked'));
    }

    public function getUser()
    {
        $users = User::all();
        $roles = Role::all();
        $statuses = Status::all();
        return view('admin.user-management', compact('users', 'roles', 'statuses'));
    }

    public function createUser(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
      ]);

      if ($validator->fails()) {
          return redirect()->route('home.user')->withErrors($validator)->withInput();
      }

      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->role_id = $request->role;
      $user->status_id = $request->status;
      $user->save();

      Session::flash('success', 'User successfully created!');
      return redirect()->route('home.user');
    }

    public function editUser(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255',
      ]);

      if ($validator->fails()) {
          return redirect()->route('home.user')->withErrors($validator)->withInput();
      }

      $user = User::find($id);
      if (isset($user)) {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->status_id = $request->status;
        $user->save();
        Session::flash('success', 'User information successfully updated!');
      } else {
        Session::flash('fail', 'User information could not be updated!');
      }
      return redirect()->route('home.user');
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
      return redirect()->route('home.user');
    }

    public function getBlog()
    {
      $blogs = Blog::all();
      $comments = Comment::all();
      $categories = Category::all();
      $contentstatuses = ContentStatus::all();
      $homepagetags = HomepageTag::all();
      $statuses = Status::where('id', '>=', 3)->get();

      return view('admin.blog-management', compact('blogs', 'comments', 'categories', 'contentstatuses', 'homepagetags', 'statuses'));
    }

    public function createBlog(Request $request)
    {
      $media_id = app('App\Http\Controllers\MediaController')->saveImage($request, 'blog');

      $blog = new Blog;
      $blog->title = $request->blog_title;
      $blog->content = $request->blog_content;
      $blog->media_id = $media_id;
      $blog->user_id = Auth::id();
      $blog->status_id = 3;
      $blog->category_id = $request->blog_category;
      $blog->homepage_tag_id = $request->blog_homepage_tag;
      $blog->content_status_id = $request->blog_content_status;
      $blog->save();

      Session::flash('success', $blog->title. ' blog successfully created!');
      return redirect()->route('home.blog');
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
      return redirect()->route('home.blog');
    }

    public function statusBlog(Request $request, $id)
    {
      $blog = Blog::find($id);
      $blog->status_id = $request->status;
      $blog->save();

      Session::flash('success', $blog->title. ' status successfully updated!');
      return redirect()->route('home.blog');
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

      return redirect()->route('home.blog');
    }

    public function createCategory(Request $request)
    {
      $media_id = app('App\Http\Controllers\MediaController')->saveImage($request, 'category');

      $category = new Category;
      $category->category_name = $request->category;
      $category->media_id = $media_id;
      $category->save();

      Session::flash('success', $category->category_name. ' category successfully created!');
      return redirect()->route('home.blog')->withInput(['tabMenu'=>'blogMgtDashboardTabMenu', 'tab'=>'category-management']);
    }

    public function editCategory(Request $request, $id)
    {
      $category = Category::find($id);

      if (isset($category)) {
        //delete previous media
        app('App\Http\Controllers\MediaController')->deleteImage($category->media_id);
        //save new media and get its id
        $media_id = app('App\Http\Controllers\MediaController')->saveImage($request, 'category');

        $old_category_name = $category->category_name;

        $category->category_name = $request->category;
        $category->media_id = $media_id;
        $category->save();
        Session::flash('success', $old_category_name. ' category successfully edited to ' . $category->category_name . '!');
      } else {
        Session::flash('success', 'Fail to edit category');
      }

      return redirect()->route('home.blog')->withInput(['tabMenu'=>'blogMgtDashboardTabMenu', 'tab'=>'category-management']);
    }

    public function deleteCategory(Request $request, $id)
    {
      $category = Category::find($id);
      $blogs = Blog::all();
      $blog_affected = 0;
      $deleted_category = $category->category_name;
      app('App\Http\Controllers\MediaController')->deleteImage($category->media_id);

      if (isset($category)) {
        foreach ($blogs as $blog) {
          if ($blog->category_id == $category->id) {
            $blog->category_id = 1;
            $blog->save();
            ++$blog_affected;
          }
        }
        $category->delete();
        Session::flash('success', $deleted_category . ' category successfully deleted! ' . $blog_affected . ' blog(s) affected. Affected blog(s) are changed to Uncategorized.');
      } else {
        Session::flash('success', 'Fail to delete category');
      }

      return redirect()->route('home.blog')->withInput(['tabMenu'=>'blogMgtDashboardTabMenu', 'tab'=>'category-management']);
    }

    // public function getComment()
    // {
    //   $comments = Comment::all();
    //
    //   return view('admin.comment-management', compact('comments'));
    // }

    public function createComment(Request $request)
    {
      return redirect()->route('home.blog')->withInput(['tabMenu'=>'blogMgtDashboardTabMenu', 'tab'=>'comment-management']);
    }

    public function editComment(Request $request, $id)
    {
      return redirect()->route('home.blog')->withInput(['tabMenu'=>'blogMgtDashboardTabMenu', 'tab'=>'comment-management']);
    }

    public function deleteComment(Request $request, $id)
    {
      return redirect()->route('home.blog')->withInput(['tabMenu'=>'blogMgtDashboardTabMenu', 'tab'=>'comment-management']);
    }
}
