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
      return redirect()->route('home.blog');
    }

    public function editBlog(Request $request, $id)
    {
      return redirect()->route('home.blog');
    }

    public function deleteBlog(Request $request, $id)
    {
      return redirect()->route('home.blog');
    }

    public function createCategory(Request $request)
    {
      return redirect()->route('home.blog')->withInput(['tabMenu'=>'blogMgtDashboardTabMenu', 'tab'=>'category-management']);
    }

    public function editCategory(Request $request, $id)
    {
      return redirect()->route('home.blog')->withInput(['tabMenu'=>'blogMgtDashboardTabMenu', 'tab'=>'category-management']);
    }

    public function deleteCategory(Request $request, $id)
    {
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
