<?php

use App\Models\Advertisements;
use App\Models\Chats;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Users;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Banner;
use App\Models\News;
use App\Models\Images;

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
Route::post('/auth', $path . '\AllController@auth');
Route::get('/logout', $path . '\AllController@logout');

// Users
Route::get('/users', function () {
    Paginator::useBootstrap();
    $users = Users::orderBy('updated_at', 'DESC')->paginate(6);
    return view('users.users', ['list'=>$users]);
})->middleware('auth')->name('users');
Route::post('/users', $path . '\AllController@search');
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
    Paginator::useBootstrap();
    $category = Category::orderBy('updated_at', 'DESC')->paginate(6);
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
Route::post('/categories', $path . '\AllController@search');
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
    Paginator::useBootstrap();
    $advertisements = Advertisements::orderBy('updated_at', 'DESC')->paginate(6);
    return view('advertisements.advertisements', ['list'=>$advertisements]);
})->middleware('auth')->name('advertisements');
Route::post('/advertisements', $path . '\AllController@search');
Route::get('/advertisements/add', function () {
    $departments = Category::where('parent', 0)->orderBy('updated_at', 'DESC')->get();
    // - - - -
    // $cities = City::orderBy('updated_at', 'DESC')->get();
    $districts = City::join('district', 'district.id', '=', 'cities.district')->groupBy('cities.district')->get();
    // foreach ($cities as $city) {
    //     if($city['district'] != 0){    
    //         $dist = District::find($city['district']);
    //         $districts[] = $dist;
    //     } else {
    //         $districts[] = [];
    //     }
    // }
    // - - - -
    $users = Users::all();
    return view('advertisements.edit', ['department'=>$departments, 'district'=>$districts, 'users'=>$users]);
})->middleware('auth')->name('advertisements');
Route::post('/advertisements/add', $path . '\AdvertisementsController@addAdvertisements');
Route::get('/advertisements/edit/{id}', function ($id) {
    $departments = Category::where('parent', 0)->orderBy('updated_at', 'DESC')->get();
    // - - - -
    $districts = City::join('district', 'district.id', '=', 'cities.district')->groupBy('cities.district')->get();
    // - - - -
    $users = Users::all();
    $advert = Advertisements::find($id);
    $category_name = Category::find($advert['category_id']);
    $city_name = City::find($advert['city_id']);
    $user_name = Users::find($advert['user_id']);
    $images = Images::where('advertisements_id', $id)->get();
    return view('advertisements.edit', ['advert'=>$advert, 'department'=>$departments, 'category_name'=>$category_name, 'district'=>$districts, 'city_name'=>$city_name, 'users'=>$users, 'user_name'=>$user_name, 'images'=>$images]);
})->middleware('auth')->name('advertisements');
Route::post('/advertisements/edit/{id}', $path . '\AdvertisementsController@editAdvertisements');
Route::get('/advertisements/upAdv/{id}', $path . '\AdvertisementsController@upAdvertisements');
Route::get('/advertisements/status/{id}', $path . '\AdvertisementsController@statusAdvertisements');
Route::get('/advertisements/delete/{id}', $path . '\AdvertisementsController@deleteAdvertisements');

// Cities
Route::get('/cities', function () {
    Paginator::useBootstrap();
    $cities = City::orderBy('updated_at', 'DESC')->paginate(6);
    $districts = District::all();
    return view('cities.cities', ['list'=>$cities, 'districts'=>$districts]);
})->middleware('auth')->name('cities');
Route::post('/cities', $path . '\AllController@search');
Route::get('/cities/add', function () {
    $districts = District::all();
    return view('cities.edit', ['districts'=>$districts]);
})->middleware('auth')->name('cities');
Route::post('/cities/add', $path . '\CitiesController@addCity');
Route::get('/cities/edit/{id}', function ($id) {
    $cities = City::find($id);
    $districts = District::all();
    return view('cities.edit', ['cities'=>$cities, 'districts'=>$districts]);
})->middleware('auth')->name('cities');
Route::post('/cities/edit/{id}', $path . '\CitiesController@editCity');
Route::get('/cities/status/{id}', $path . '\CitiesController@statusCity');
Route::get('/cities/delete/{id}', $path . '\CitiesController@deleteCity');

// Banners
Route::get('/banners', function () {
    Paginator::useBootstrap();
    $banners = Banner::orderBy('updated_at', 'DESC')->paginate(6);
    return view('banners.banners', ['list'=>$banners]);
})->middleware('auth')->name('banners');
Route::post('/banners', $path . '\AllController@search');
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
    Paginator::useBootstrap();
    $news = News::orderBy('updated_at', 'DESC')->paginate(6);
    return view('news.news', ['list'=>$news]);
})->middleware('auth')->name('news');
Route::post('/news', $path . '\AllController@search');
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
    Paginator::useBootstrap();
    $chats = Chats::selectRaw('chats.*, users.phone as phone')->join('users', 'chats.user_id', '=', 'users.id')->groupBy('user_id')->paginate(6);
    return view('chat.chat', ['chats'=>$chats]);
})->middleware('auth')->name('chat');
Route::get('/chat/edit/{id}', function ($id) {
    $chats = Chats::where('user_id', $id)->get();
    return view('chat.edit', ['chats'=>$chats]);
})->middleware('auth')->name('chat');

// Ajax
Route::post('/getSubCategory', $path . '\AllController@getSubCategory');
Route::post('/getCities', $path . '\AllController@getCities');
Route::post('/getUsers', $path . '\AllController@getUsers');

// Other
Route::post('/fetch-files', $path . '\FileController@fetchFiles');
Route::post('/upload', function (Request $request) {
    var_dump($request->images);
});

// Send msg
Route::post('/sendMsg', function(Request $req){
    $c = new Chats;
    $c->type = 0;
    $c->user_id = $req->user;
    $c->text = $req->msg;
    $c->save(); 
});