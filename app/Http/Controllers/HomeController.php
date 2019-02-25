<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;
use DB;
use App\Models\User;
use App\Models\Role;
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
        return view('admin.home');
    }

    public function getUser()
    {
        $users = User::all();
        return view('admin.user-management', compact('users'));
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

      return view('admin.blog-management', compact('blogs', 'comments', 'categories', 'contentstatuses', 'homepagetags'));
    }

    public function createBlog(Request $request)
    {
      $blog = new Blog;
      $blog->title = $request->blog_title;
      $blog->content = $request->blog_content;
      $blog->media_id = null;
      $blog->user_id = Auth::id();
      $blog->category_id = $request->blog_category;
      $blog->homepage_tag_id = $request->blog_homepage_tag;
      $blog->content_status_id = $request->blog_content_status;
      $blog->save();

      Session::flash('success', 'Blog successfully created!');
      return redirect()->route('home.blog');
    }

    public function editBlog(Request $request, $id)
    {
      $blog = Blog::find($id);

      if (isset($blog)) {
        $blog->title = $request->blog_title;
        $blog->content = $request->blog_content;
        $blog->media_id = null;
        $blog->category_id = $request->blog_category;
        $blog->homepage_tag_id = $request->blog_homepage_tag;
        $blog->content_status_id = $request->blog_content_status;
        $blog->save();
        Session::flash('success', 'Blog successfully updated!');
      } else {
        Session::flash('fail', 'Fail to update blog');
      }
      return redirect()->route('home.blog');
    }

    public function deleteBlog(Request $request, $id)
    {
      $blog = Blog::find($id);

      if (isset($blog)) {
        $blog->delete();
        Session::flash('success', 'Blog successfully deleted!');
      } else {
        Session::flash('success', 'Fail to delete blog');
      }

      return redirect()->route('home.blog');
    }

    public function createCategory(Request $request)
    {
      $media_id = app('App\Http\Controllers\MediaController')->saveCategoryImage($request);

      $category = new Category;
      $category->category_name = $request->category;
      $category->media_id = $media_id;
      $category->save();

      Session::flash('success', 'Category successfully created!');
      return redirect()->route('home.blog')->withInput(['tabMenu'=>'blogMgtDashboardTabMenu', 'tab'=>'category-management']);
    }

    public function editCategory(Request $request, $id)
    {
      $category = Category::find($id);

      if (isset($category)) {
        //delete previous media
        app('App\Http\Controllers\MediaController')->deleteImage($category->media_id);
        //save new media and get its id
        $media_id = app('App\Http\Controllers\MediaController')->saveCategoryImage($request);

        $category->category_name = $request->category;
        $category->media_id = $media_id;
        $category->save();
        Session::flash('success', 'Category successfully edited!');
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

      if (isset($category)) {
        foreach ($blogs as $blog) {
          if ($blog->category_id == $category->id) {
            $blog->category_id = 1;
            $blog->save();
            ++$blog_affected;
          }
        }
        $category->delete();
        Session::flash('success', 'Category successfully deleted! ' . $blog_affected . ' blog(s) with the category of ' . $deleted_category . ' are changed to Uncategorized.');
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
