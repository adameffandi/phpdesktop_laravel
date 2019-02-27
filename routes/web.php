<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PublicController@index')->name('landing');
Route::post('userlogin', 'PublicController@userLogin')->name('user.login');
Route::get('logout', 'PublicController@logout2')->name('logout2');

Auth::routes();

// ===============================================================================================
// ================================= ADMON =======================================================
// ===============================================================================================

Route::group(["middleware" => "App\Http\Middleware\AdminMiddleware", 'prefix' => 'home'], function () {
  Route::get('/', 'HomeController@index')->name('home');
  // ================================= user =================================
  Route::get('/user', 'HomeController@getUser')->name('home.user');
  Route::post('/user/create', 'HomeController@createUser')->name('home.user.create');
  Route::post('/user/edit/{id}', 'HomeController@editUser')->name('home.user.edit');
  Route::post('/user/delete/{id}', 'HomeController@deleteUser')->name('home.user.delete');
  // ================================= blog =================================
  Route::get('/blog', 'HomeController@getBlog')->name('home.blog'); // for blog, category and comment
  Route::post('/blog/create', 'HomeController@createBlog')->name('home.blog.create');
  Route::post('/blog/edit/{id}', 'HomeController@editBlog')->name('home.blog.edit');
  Route::post('/blog/delete/{id}', 'HomeController@deleteBlog')->name('home.blog.delete');
  // ================================= category =================================
  Route::post('/category/create', 'HomeController@createCategory')->name('home.category.create');
  Route::post('/category/edit/{id}', 'HomeController@editCategory')->name('home.category.edit');
  Route::post('/category/delete/{id}', 'HomeController@deleteCategory')->name('home.category.delete');
  // ================================= comment =================================
  // Route::get('/comment', 'HomeController@getComment')->name('home.comment');
  Route::post('/comment/create', 'HomeController@createComment')->name('home.comment.create');
  Route::post('/comment/edit/{id}', 'HomeController@editComment')->name('home.comment.edit');
  Route::post('/comment/delete/{id}', 'HomeController@deleteComment')->name('home.comment.delete');
});

// ===============================================================================================
// ================================= USER ========================================================
// ===============================================================================================

Route::group(['prefix' => 'user'], function () {
  Route::get('/', 'UserController@index')->name('user');
  Route::post('/profile/create', 'UserController@createUser')->name('user.profile.create');
  Route::post('/profile/edit/{id}', 'UserController@editUser')->name('user.profile.edit');
  Route::post('/profile/delete/{id}', 'UserController@deleteUser')->name('user.profile.delete');
  Route::get('/blog', 'UserController@getBlog')->name('user.blog');
  Route::post('/blog/create', 'UserController@createBlog')->name('user.blog.create');
  Route::post('/blog/edit/{id}', 'UserController@editBlog')->name('user.blog.edit');
  Route::post('/blog/delete/{id}', 'UserController@deleteBlog')->name('user.blog.delete');
  Route::get('/comment', 'UserController@getComment')->name('user.comment');
  Route::post('/comment/create', 'UserController@createComment')->name('user.comment.create');
  Route::post('/comment/edit/{id}', 'UserController@editComment')->name('user.comment.edit');
  Route::post('/comment/delete/{id}', 'UserController@deleteComment')->name('user.comment.delete');
});
