<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect("login");
});

Route::get('/signup', function () {
    return view('signup');
})->name("signup");

Route::get('/login', function () {
    return view('login');
})->name("login");

Route::get('/Logout', function(){
    Session::flush();
    return redirect("login");
});

route::get('/home', 'App\Http\Controllers\HomeController@showHome')->name("home");
route::get('/Profile', 'App\Http\Controllers\ProfileController@showProfile')->name("Profile");
route::get('/createPost', 'App\Http\Controllers\PostCreatorController@showCreator')->name("New Post");
route::get('/getGame/{game}', 'App\Http\Controllers\PostCreatorController@getGame');
route::post('/insertPost', 'App\Http\Controllers\PostCreatorController@insertPost');
route::post('/insertUser', 'App\Http\Controllers\SignupController@insertUser');
route::post('/checkLogin', 'App\Http\Controllers\SignupController@checkLogin');
route::get('/register/username/{user}', 'App\Http\Controllers\SignupController@checkUsername');
route::get('/register/mail/{mail}', 'App\Http\Controllers\SignupController@checkMail');
route::get('/getPosts/{user?}', 'App\Http\Controllers\HomeController@getPosts');
route::get('/LikeInsert/{PostId}', 'App\Http\Controllers\HomeController@LikeInsert');
route::get('/LikeDelete/{PostId}', 'App\Http\Controllers\HomeController@LikeDelete');
route::get('/InsertComments/{Content}/{Username}/{Post}', 'App\Http\Controllers\HomeController@sendComment');
route::get('/deletePost/{id}', 'App\Http\Controllers\ProfileController@deletePost');
route::get('/getComments/{id}', 'App\Http\Controllers\HomeController@getComments');