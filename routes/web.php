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

// 初始欢迎界面
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/welcome', function () {
    return view('welcome');
});

//畅言
Route::get('/changyan/login', 'ChangyanController@getuserinfo')->name('changyan_login');
Route::get('/changyan/logout', 'ChangyanController@changyan_logout')->name('changyan_logout');

// static_pages
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('/sponsor', 'StaticPagesController@sponsor')->name('sponsor');
Route::get('/contact', 'StaticPagesController@contact')->name('contact');
Route::get('/valhalla', 'StaticPagesController@valhalla')->name('valhalla');
Route::get('/bug', 'StaticPagesController@bug')->name('bug');
Route::get('/advice', 'StaticPagesController@advice')->name('advice');

//******* 用户 *******
Route::resource('users', 'UsersController');

// 注册
Route::get('signup', 'UsersController@create')->name('signup');
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
// 登陆
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

// 状态
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

// 密码管理
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/users/{id}/edit_password', 'UsersController@editPassword')->name('users.edit_password');
Route::patch('/users/{id}/update_password', 'UsersController@updatePassword')->name('users.update_password');

// 关注
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');

//头像
Route::get('/users/{id}/edit_avatar', 'UsersController@editAvatar')->name('users.edit_avatar');

//******* 藏书 *******
Route::resource('books', 'BooksController');

//*******后台管理*******

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/','admin\HomeController@index')->name('admin');
});

