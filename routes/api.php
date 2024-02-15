<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Views;
use App\Models\News;
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
    $news = News::orderBy('updated_at', 'DESC')->get();
    $json = json_encode($news);
    return $json;
});

// Banner
Route::get('/banners', function () {
    $banner = Banner::orderBy('updated_at', 'DESC')->get();
    $json = json_encode($banner);
    return $json;
});
