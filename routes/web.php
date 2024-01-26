<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('users.users');
});
Route::get('/edit', function () {
    return view('users.edit');
});
Route::get('/test', function () {
    return view('test');
});
Route::post('/upload', function (Request $request) {
    // return view('test');
    var_dump($request->images);
});



Route::get('/categories', function () {
    return view('categories.categories');
});
Route::get('/categories/edit', function () {
    return view('categories.edit');
});



Route::get('/advertisements', function () {
    return view('advertisements.advertisements');
});
Route::get('/advertisements/edit', function () {
    return view('advertisements.edit');
});



Route::get('/cities', function () {
    return view('locations.locations');
});
Route::get('/cities/edit', function () {
    return view('locations.edit');
});



Route::get('/banners', function () {
    return view('banners.banners');
});
Route::get('/banners/edit', function () {
    return view('banners.edit');
});



Route::get('/news', function () {
    return view('news.news');
});
Route::get('/news/edit', function () {
    return view('news.edit');
});



Route::get('/chat', function () {
    return view('chat.chat');
});
Route::get('/chat/edit', function () {
    return view('chat.edit');
});
