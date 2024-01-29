<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Users;

$path = 'App\Http\Controllers';

// Redirect
Route::get('/', function () {
    return redirect('/users');
});

// Users
Route::get('/users', function () {
    $users = Users::orderBy('updated_at', 'DESC')->get();
    return view('users.users', ['users'=>$users]);
});
Route::get('/users/add', function () {
    return view('users.edit');
});
Route::post('/users/add', $path . '\UsersController@addUser');
Route::get('/users/edit/{id}', function ($id) {
    $user = Users::find($id);
    return view('users.edit', ['user'=>$user]);
});
Route::post('/users/edit/{id}', $path . '\UsersController@editUser');
Route::get('/users/status/{id}', $path . '\UsersController@statusUser');
Route::get('/users/delete/{id}', $path . '\UsersController@deleteUser');

// Categories
Route::get('/categories', function () {
    return view('categories.categories');
});
Route::get('/categories/add', function () {
    return view('categories.edit');
});
Route::get('/categories/edit/{id}', function ($id) {
    return view('categories.edit');
});

// Advertisements
Route::get('/advertisements', function () {
    return view('advertisements.advertisements');
});
Route::get('/advertisements/add', function () {
    return view('advertisements.edit');
});
Route::get('/advertisements/edit', function () {
    return view('advertisements.edit');
});

// Cities
Route::get('/cities', function () {
    return view('locations.locations');
});
Route::get('/cities/add', function () {
    return view('locations.edit');
});
Route::get('/cities/edit', function () {
    return view('locations.edit');
});

// Banners
Route::get('/banners', function () {
    return view('banners.banners');
});
Route::get('/banners/add', function () {
    return view('banners.edit');
});
Route::get('/banners/edit', function () {
    return view('banners.edit');
});

// News
Route::get('/news', function () {
    return view('news.news');
});
Route::get('/news/add', function () {
    return view('news.edit');
});
Route::get('/news/edit', function () {
    return view('news.edit');
});

// Chat
Route::get('/chat', function () {
    return view('chat.chat');
});
Route::get('/chat/edit', function () {
    return view('chat.edit');
});

// Other
Route::post('/upload', function (Request $request) {
    // return view('test');
    var_dump($request->images);
});

Route::get('/test', function () {
    return view('test');
});

Route::post('/fetch-files', $path . '\FileController@fetchFiles');
