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
Route::get('/blogs-all', 'PublicController@getAllBlogs')->name('all.blog');
Route::get('/blog-single/{id}', 'PublicController@viewBlog')->name('view.blog');
Route::get('/category', 'PublicController@getCategory')->name('view.category');
Route::get('/blogs-with-category/{id}', 'PublicController@getBlogWithCategory')->name('view.blog.with.category');
Route::get('/author/profile/{id}', 'PublicController@getAuthorProfile')->name('view.author');
Route::get('/download/links', 'PublicController@getDownloadLinks')->name('view.download.links');

Route::post('userlogin', 'PublicController@userLogin')->name('user.login');
Route::get('logout', 'PublicController@logout2')->name('logout2');

Auth::routes();

// ===============================================================================================
// ================================= ADMiN =======================================================
// ===============================================================================================

Route::group(["middleware" => "App\Http\Middleware\AdminMiddleware", 'prefix' => 'home'], function () {
  Route::get('/', 'HomeController@index')->name('home');
  // ================================= profile =================================
  Route::post('/profile/edit/{id}', 'HomeController@editProfile')->name('home.profile.edit');
  // ================================= user & permission =================================
  Route::get('/user', 'HomeController@getUser')->name('home.user');
  Route::post('/user/create', 'HomeController@createUser')->name('home.user.create');
  Route::post('/user/edit/{id}', 'HomeController@editUser')->name('home.user.edit');
  Route::post('/user/delete/{id}', 'HomeController@deleteUser')->name('home.user.delete');
  Route::post('/user/permission', 'HomeController@setUserPermission')->name('home.user.permission');
  // ================================= blog =================================
  Route::get('/blog', 'HomeController@getBlog')->name('home.blog'); // for blog and category
  Route::post('/blog/create', 'HomeController@createBlog')->name('home.blog.create');
  Route::post('/blog/edit/{id}', 'HomeController@editBlog')->name('home.blog.edit');
  Route::post('/blog/status/{id}', 'HomeController@statusBlog')->name('home.blog.status');
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
  Route::post('/profile/edit/{id}', 'UserController@editProfile')->name('user.profile.edit');
  Route::get('/blog', 'UserController@getBlog')->name('user.blog');
  Route::post('/blog/create', 'UserController@createBlog')->name('user.blog.create');
  Route::post('/blog/edit/{id}', 'UserController@editBlog')->name('user.blog.edit');
  Route::post('/blog/delete/{id}', 'UserController@deleteBlog')->name('user.blog.delete');
  Route::get('/comment', 'UserController@getComment')->name('user.comment');
  Route::post('/comment/create', 'UserController@createComment')->name('user.comment.create');
  Route::post('/comment/edit/{id}', 'UserController@editComment')->name('user.comment.edit');
  Route::post('/comment/delete/{id}', 'UserController@deleteComment')->name('user.comment.delete');
});
