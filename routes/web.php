<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Banner;

$path = 'App\Http\Controllers';

// Redirect
Route::get('/', function () {
    return redirect('/users');
});

// Auth
Route::get('/auth', function () {
    return view('auth');
});

// Users
Route::get('/users', function () {
    $users = Users::orderBy('updated_at', 'DESC')->get();
    return view('users.users', ['users'=>$users]);
})->name('users');
Route::get('/users/add', function () {
    return view('users.edit');
})->name('users');
Route::post('/users/add', $path . '\UsersController@addUser');
Route::get('/users/edit/{id}', function ($id) {
    $user = Users::find($id);
    return view('users.edit', ['user'=>$user]);
})->name('users');
Route::post('/users/edit/{id}', $path . '\UsersController@editUser');
Route::get('/users/status/{id}', $path . '\UsersController@statusUser');
Route::get('/users/delete/{id}', $path . '\UsersController@deleteUser');

// Categories
Route::get('/categories', function () {
    $category = Category::orderBy('updated_at', 'DESC')->get();
    $department_name = array();
    foreach ($category as $categ) {
        if($categ['parent'] != 0){    
            $cat = Category::find($categ['parent']);
            $department_name[] = $cat['ru_name'];
        } else {
            $department_name[] = '';
        }
    }
    return view('categories.categories', ['category'=>$category, 'department_name'=>$department_name]);
})->name('categories');
Route::get('/categories/add', function () {
    $department = Category::where('parent', 0)->get();
    return view('categories.edit', ['department'=>$department, 'childCheck'=>0]);
})->name('categories');
Route::post('/categories/add', $path . '\CategoryController@addCategory');
Route::get('/categories/edit/{id}', function ($id) {
    $department = Category::where('parent', 0)->get();
    $category = Category::find($id);
    $department_name = '';
    if($category['parent'] != 0){
        $categ = Category::find($category['parent']);
        $department_name = $categ['ru_name'];
    }
    $childCheck = Category::where('parent', $id)->count();
    return view('categories.edit', ['department'=>$department, 'category'=>$category, 'department_name'=>$department_name, 'childCheck'=>$childCheck]);
})->name('categories');
Route::post('/categories/edit/{id}', $path . '\CategoryController@editCategory');
Route::get('/categories/status/{id}', $path . '\CategoryController@statusCategory');
Route::get('/categories/delete/{id}', $path . '\CategoryController@deleteCategory');

// Advertisements
Route::get('/advertisements', function () {
    return view('advertisements.advertisements');
})->name('advertisements');
Route::get('/advertisements/add', function () {
    return view('advertisements.edit');
})->name('advertisements');
Route::get('/advertisements/edit', function () {
    return view('advertisements.edit');
})->name('advertisements');

// Cities
Route::get('/cities', function () {
    $cities = City::orderBy('updated_at', 'DESC')->get();
    $districts = District::all();
    return view('locations.locations', ['cities'=>$cities, 'districts'=>$districts]);
})->name('cities');
Route::get('/cities/add', function () {
    return view('locations.edit');
})->name('cities');
Route::post('/cities/add', $path . '\CitiesController@addCity');
Route::get('/cities/edit/{id}', function ($id) {
    $cities = City::find($id);
    $districts = District::all();
    return view('locations.edit', ['cities'=>$cities, 'districts'=>$districts]);
})->name('cities');
Route::post('/cities/edit/{id}', $path . '\CitiesController@editCity');
Route::get('/cities/status/{id}', $path . '\CitiesController@statusCity');
Route::get('/cities/delete/{id}', $path . '\CitiesController@deleteCity');

// Banners
Route::get('/banners', function () {
    $banners = Banner::orderBy('updated_at', 'DESC')->get();
    return view('banners.banners', ['banners'=>$banners]);
})->name('banners');
Route::get('/banners/add', function () {
    return view('banners.edit');
})->name('banners');
Route::post('/banners/add', $path . '\BannerController@addBanner');
Route::get('/banners/edit/{id}', function ($id) {
    $banner = Banner::find($id);
    return view('banners.edit',  ['banner'=>$banner]);
})->name('banners');
Route::post('/banners/edit/{id}', $path . '\BannerController@editBanner');
Route::get('/banners/status/{id}', $path . '\BannerController@statusBanner');
Route::get('/banners/delete/{id}', $path . '\BannerController@deleteBanner');

// News
Route::get('/news', function () {
    return view('news.news');
})->name('news');
Route::get('/news/add', function () {
    return view('news.edit');
})->name('news');
Route::get('/news/edit', function () {
    return view('news.edit');
})->name('news');

// Chat
Route::get('/chat', function () {
    return view('chat.chat');
})->name('chat');
Route::get('/chat/edit', function () {
    return view('chat.edit');
})->name('chat');

// Other
Route::post('/fetch-files', $path . '\FileController@fetchFiles');
Route::post('/upload', function (Request $request) {
    var_dump($request->images);
});