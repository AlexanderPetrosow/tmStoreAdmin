<?php

use App\Models\AdvertDetail;
use App\Models\Category;
use App\Models\CategoryDetail;
use App\Models\City;
use App\Models\DepartmentDetail;
use App\Models\DistrictDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Views;
use App\Models\News;
use App\Models\Images;
use App\Models\Banner;
use App\Models\Users;

$path = 'App\Http\Controllers';

// Views statis
Route::post('/add-view', function (Request $req) {
    $view = new Views;
    $view->user_id = $req->user_id;
    $view->type = $req->type;
    $view->type_id = $req->type_id;
    $view->save();
});

Route::post('/get-view', function (Request $req) {
    $view = Views::where('type', $req->type)->where('type_id', $req->type_id)->count();
    $json = json_encode($view);
    return $json;
});

// News
Route::get('/news', function () {
    $news = News::where('status', 1)->orderBy('updated_at', 'DESC')->get();
    $json = json_encode($news);
    return $json;
});

// Images
Route::post('/get-images', function (Request $req) {
    $img = Images::where('advertisements_id', $req->id)->orderBy('updated_at', 'DESC')->get();
    $json = json_encode($img);
    return $json;
});

// Banner
Route::post('/banners', function (Request $req) {
    $banner = Banner::query();
    if($req->main == '1'){
        $banner = $banner->where('status_main', 1);
    }
    if($req->category == '1'){
        $banner = $banner->where('status_category', 1);
    }
    if($req->advert == '1'){
        $banner = $banner->where('status_advert', 1);
    }
    $banner = $banner->where('status', 1)->orderBy('updated_at', 'DESC')->get();
    $json = json_encode($banner);
    return $json;
});

// Advertisements
Route::post('/advertisements', function (Request $req) {
    $adv = AdvertDetail::query();
    if($req->vip == '1'){
        $adv = $adv->where('status_vip', 1);
    }
    if($req->department != '0'){
        $adv = $adv->where('department_id', $req->department);
    }
    if($req->category != '0'){
        $adv = $adv->where('category_id', $req->category);
    }
    if($req->search != ''){
        $adv = $adv->where('name', 'like', '%' . $req->search . '%');
    }
    if($req->price != ''){
        $adv = $adv->where('price', '>=', $req->price);
    }
    $adv = $adv->where('status', 1)->orderBy('dates', 'DESC')->get();
    $json = json_encode($adv);
    return $json;
});

// Categories
// Department
Route::get('/department', function () {
    $dep = DepartmentDetail::where('status', 1)->orderBy('updated_at', 'DESC')->get();
    $json = json_encode($dep);
    return $json;
});
// Category
Route::post('/category', function (Request $req) {
    $categ = CategoryDetail::where('parent', $req->id)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
    $json = json_encode($categ);
    return $json;
});

// Cities
// District
Route::get('/district', function () {
    $dis = DistrictDetail::orderBy('updated_at', 'DESC')->get();
    $json = json_encode($dis);
    return $json;
});

Route::post('/cities', function (Request $req) {
    $city = City::where('district', $req->id)->orderBy('updated_at', 'DESC')->get();
    $json = json_encode($city);
    return $json;
});


// Auth
// Check
Route::post('/auth', function (Request $req) {
    $user = Users::where('phone', $req->phone)->get();
    if(count($user) != 0){
        if($user[0]['status'] != '1'){
            echo 0;
        } else {
            echo 1; 
        }
    } else {
        echo 0;
    }
});

// Registration
Route::post('/regUser', function (Request $req) {
    $user = Users::where('phone', $req->phone)->get();
    if(count($user) != 0){
        $u = Users::find($user[0]['id']);
        $u->status = 1;
        $u->save();
    } else {
        $u = new Users;
        $u->phone = $req->phone;
        $u->status = 1;
        $u->save();
    }
});

// Logout
Route::post('/logout', function (Request $req) {
    $user = Users::where('phone', $req->phone)->get();
    if(count($user) != 0){
        $u = Users::find($user[0]['id']);
        $u->status = 0;
        $u->save();
    }
});

// Mail
// Claim
Route::post('/claim', $path . '\AllController@sendClaim');