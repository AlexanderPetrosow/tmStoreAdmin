<?php

use App\Models\AdvertDetail;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Views;
use App\Models\News;
use App\Models\Images;
use App\Models\Banner;

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
Route::post('/images', function (Request $req) {
    $img = Images::where('advertisements_id', $req->id)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
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
    $adv = $adv->where('status', 1)->orderBy('updated_at', 'DESC')->get();
    $json = json_encode($adv);
    return $json;
});

// Categories
// Department
Route::get('/department', function () {
    $dep = Category::where('parent', 0)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
    $json = json_encode($dep);
    return $json;
});
// Category
Route::post('/category', function (Request $req) {
    $categ = Category::where('parent', $req->id)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
    $json = json_encode($categ);
    return $json;
});