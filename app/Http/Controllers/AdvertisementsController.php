<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Advertisements;
use App\Models\Images;

class AdvertisementsController extends Controller
{
    public function addAdvertisements(Request $req){

        $validator = \Validator::make(request()->all(), 
        [
            'category' => 'required',
            'city' => 'required',
            'user' => 'required',
        ],
        [
            'category.required' => 'Выберите категорию',
            'city.required' => 'Выберите город',
            'user.required' => 'Выберите пользователя',
        ] );
        if(!isset($req->images)){
            $validator->after(function ($validator) {
                $validator->errors()->add('images', "Загрузите фото");
            });
        } 
        $validator->validate(); 

        $advertisements = new Advertisements;
        $advertisements->name = $req->name;
        $advertisements->category_id = $req->category;
        $advertisements->description = $req->description;
        $advertisements->city_id = $req->city;
        if($req->main_image){
            // Save image (base64)
            $img = $req->main_image;
            $ext = explode('/', mime_content_type($img[0]))[1];
            $imageName = uniqid().'.'.$ext;
            Storage::put('advertisements/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $img[0])));
            $advertisements->main_image = 'advertisements/'.$imageName;
        }
        $advertisements->phone = $req->phone;
        $advertisements->price = $req->price;
        $advertisements->user_id = $req->user;
        if($req->status){
            $advertisements->status = $req->status;
        }
        if($req->status_vip){
            $advertisements->status_vip = $req->status_vip;
        }
        $advertisements->save();
        $advertId = $advertisements->id;

        $imagess = $req->images;
        for ($ii=0; $ii < count($imagess); $ii++) { 
            $ext = explode('/', mime_content_type($imagess[$ii]))[1];
            $imageName = uniqid().'.'.$ext;
            Storage::put('advertisements/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $imagess[$ii])));
            $imageC = new Images;
            $imageC->advertisements_id = $advertId;
            $imageC->image = 'advertisements/'.$imageName;
            $imageC->save();
        }
        return redirect('/advertisements');
        
    }
    public function editAdvertisements(Request $req, $id){        
        $advertisements = Advertisements::find($id);
        $advertisements->name = $req->name;

        // Save image (base64)
        if($req->images){
            $img = $req->images;
            $ext = explode('/', mime_content_type($img[0]))[1];
            $imageName = uniqid().'.'.$ext;
            Storage::put('advertisements/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $img[0])));
            $advertisements->image = 'advertisements/'.$imageName;
        }
        
        if($req->status_main){
            $advertisements->status_main = $req->status_main;
        }
        if($req->status_category){
            $advertisements->status_category = $req->status_category;
        }
        if($req->status_advert){
            $advertisements->status_advert = $req->status_advert;
        }
        $advertisements->save();
        return redirect('/advertisements');
    }
    public function statusAdvertisements(Request $req, $id){
        $advertisements = Advertisements::find($id);
        $advertisements->status = $advertisements->status ? 0 : 1;
        $advertisements->save();
        return back();
    }
    public function deleteAdvertisements(Request $req, $id){
        Advertisements::find($id)->delete();
        return back();
    }
}
