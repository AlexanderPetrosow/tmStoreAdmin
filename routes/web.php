<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Banner;
use App\Models\News;

$path = 'App\Http\Controllers';

// Redirect
Route::get('/', function () {
    if (!session()->has('admin')) {
        return redirect('/auth');
    } else {
        return redirect('/users');
    }
});

// Auth
Route::get('/auth', function () {
    if (session()->has('admin')) {
        return redirect('/users');
    } else {
        return view('auth');
    }
});
Route::post('/auth', $path . '\AdminController@auth');
Route::get('/logout', $path . '\AdminController@logout');

// Users
Route::get('/users', function () {
    $users = Users::orderBy('updated_at', 'DESC')->get();
    return view('users.users', ['list'=>$users]);
})->middleware('auth')->name('users');
Route::get('/users/add', function () {
    return view('users.edit');
})->middleware('auth')->name('users');
Route::post('/users/add', $path . '\UsersController@addUser');
Route::get('/users/edit/{id}', function ($id) {
    $user = Users::find($id);
    return view('users.edit', ['user'=>$user]);
})->middleware('auth')->name('users');
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
    return view('categories.categories', ['list'=>$category, 'department_name'=>$department_name]);
})->middleware('auth')->name('categories');
Route::get('/categories/add', function () {
    $department = Category::where('parent', 0)->get();
    return view('categories.edit', ['department'=>$department, 'childCheck'=>0]);
})->middleware('auth')->name('categories');
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
})->middleware('auth')->name('categories');
Route::post('/categories/edit/{id}', $path . '\CategoryController@editCategory');
Route::get('/categories/status/{id}', $path . '\CategoryController@statusCategory');
Route::get('/categories/delete/{id}', $path . '\CategoryController@deleteCategory');

// Advertisements
Route::get('/advertisements', function () {
    return view('advertisements.advertisements');
})->middleware('auth')->name('advertisements');
Route::get('/advertisements/add', function () {
    return view('advertisements.edit');
})->middleware('auth')->name('advertisements');
Route::get('/advertisements/edit', function () {
    return view('advertisements.edit');
})->middleware('auth')->name('advertisements');

// Cities
Route::get('/cities', function () {
    $cities = City::orderBy('updated_at', 'DESC')->get();
    $districts = District::all();
    return view('locations.locations', ['list'=>$cities, 'districts'=>$districts]);
})->middleware('auth')->name('cities');
Route::get('/cities/add', function () {
    return view('locations.edit');
})->middleware('auth')->name('cities');
Route::post('/cities/add', $path . '\CitiesController@addCity');
Route::get('/cities/edit/{id}', function ($id) {
    $cities = City::find($id);
    $districts = District::all();
    return view('locations.edit', ['cities'=>$cities, 'districts'=>$districts]);
})->middleware('auth')->name('cities');
Route::post('/cities/edit/{id}', $path . '\CitiesController@editCity');
Route::get('/cities/status/{id}', $path . '\CitiesController@statusCity');
Route::get('/cities/delete/{id}', $path . '\CitiesController@deleteCity');

// Banners
Route::get('/banners', function () {
    $banners = Banner::orderBy('updated_at', 'DESC')->get();
    return view('banners.banners', ['list'=>$banners]);
})->middleware('auth')->name('banners');
Route::get('/banners/add', function () {
    return view('banners.edit');
})->middleware('auth')->name('banners');
Route::post('/banners/add', $path . '\BannerController@addBanner');
Route::get('/banners/edit/{id}', function ($id) {
    $banner = Banner::find($id);
    return view('banners.edit',  ['banner'=>$banner]);
})->middleware('auth')->name('banners');
Route::post('/banners/edit/{id}', $path . '\BannerController@editBanner');
Route::get('/banners/status/{id}', $path . '\BannerController@statusBanner');
Route::get('/banners/delete/{id}', $path . '\BannerController@deleteBanner');

// News
Route::get('/news', function () {
    $news = News::orderBy('updated_at', 'DESC')->get();
    return view('news.news', ['list'=>$news]);
})->middleware('auth')->name('news');
Route::get('/news/add', function () {
    return view('news.edit');
})->middleware('auth')->name('news');
Route::post('/news/add', $path . '\NewsController@addNews');
Route::get('/news/edit/{id}', function ($id) {
    $news = News::find($id);
    return view('news.edit', ['news'=>$news]);
})->middleware('auth')->name('news');
Route::post('/news/edit/{id}', $path . '\NewsController@editNews');
Route::get('/news/status/{id}', $path . '\NewsController@statusNews');
Route::get('/news/delete/{id}', $path . '\NewsController@deleteNews');

// Chat
Route::get('/chat', function () {
    return view('chat.chat');
})->middleware('auth')->name('chat');
Route::get('/chat/edit', function () {
    return view('chat.edit');
})->middleware('auth')->name('chat');

// Other
Route::post('/fetch-files', $path . '\FileController@fetchFiles');
Route::post('/upload', function (Request $request) {
    var_dump($request->images);
});