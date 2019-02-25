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
      $categories = Category::take(5)->get();
      return view('welcome', compact('categories'));
    }
}
