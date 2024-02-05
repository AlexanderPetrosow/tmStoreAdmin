<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerController extends Controller
{
    public function addBanner(Request $req){

        $validator = \Validator::make(request()->all(), []);
        if(!isset($req->images)){
            $validator->after(function ($validator) {
                $validator->errors()->add('images', "Загрузите баннер");
            });
        } 
        $validator->validate(); 

        $banner = new Banner;
        $banner->name = $req->name;

        // Save image (base64)
        $img = $req->images;
        $ext = explode('/', mime_content_type($img[0]))[1];
        $imageName = uniqid().'.'.$ext;
        Storage::put('banner/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $img[0])));
        $banner->image = 'banner/'.$imageName;
        
        if($req->status_main){
            $banner->status_main = $req->status_main;
        }
        if($req->status_category){
            $banner->status_category = $req->status_category;
        }
        if($req->status_advert){
            $banner->status_advert = $req->status_advert;
        }
        $banner->save();
        return redirect('/banners');
        
    }
    public function editBanner(Request $req, $id){        
        $banner = Banner::find($id);
        $banner->name = $req->name;

        // Save image (base64)
        if($req->images){
            $img = $req->images;
            $ext = explode('/', mime_content_type($img[0]))[1];
            $imageName = uniqid().'.'.$ext;
            Storage::put('banner/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $img[0])));
            $banner->image = 'banner/'.$imageName;
        }
        
        if($req->status_main){
            $banner->status_main = $req->status_main;
        }
        if($req->status_category){
            $banner->status_category = $req->status_category;
        }
        if($req->status_advert){
            $banner->status_advert = $req->status_advert;
        }
        $banner->save();
        return redirect('/banners');
    }
    public function statusBanner(Request $req, $id){
        $banner = Banner::find($id);
        $banner->status = $banner->status ? 0 : 1;
        $banner->save();
        return back();
    }
    public function deleteBanner(Request $req, $id){
        Banner::find($id)->delete();
        return back();
    }
}
