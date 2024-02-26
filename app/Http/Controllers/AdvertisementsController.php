<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Advertisements;
use App\Models\Images;
use Image;

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
        // if(!isset($req->images)){
        //     $validator->after(function ($validator) {
        //         $validator->errors()->add('images', "Загрузите фото");
        //     });
        // } 
        $validator->validate(); 

        $advertisements = new Advertisements;
        $advertisements->name = $req->name;
        $advertisements->category_id = $req->category;
        $advertisements->description = $req->description;
        $advertisements->city_id = $req->city;

        // Save image (base64)
        // Main Image
        if(isset($req->main_image) || isset($req->images)){
            if(isset($req->main_image)){
                $img = $req->main_image;
            } else {
                $img = $req->images;
            }
            $ext = explode('/', mime_content_type($img[0]))[1];
            $imageName = uniqid().'.'.$ext;
            $image = Storage::put('advertisements/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $img[0])));

            $image = Image::make('storage/advertisements/'.$imageName);
            $watermark = Image::make('assets/images/watermark.png');
            $watermark->resize($image->width(), $image->height());
            // $watermark->resize($image->width() / 6, $image->height() / 6);
            // $watermark->rotate(-45);
            // $image->insert($watermark, 'bottom-right', 10, 10);
            // $image->insert($watermark, 'bottom-left', 10, 10);
            // $image->insert($watermark, 'top-right', 10, 10);
            // $image->insert($watermark, 'top-left', 10, 10);
            $image->insert($watermark, 'center', 0, 0);
            $image->save('storage/advertisements/'.$imageName);
            
            $advertisements->main_image = 'advertisements/'.$imageName;
        } else {
            $advertisements->main_image = '';
        }
        // - - -
        if(isset($req->secureCheckBox)){
            $advertisements->secure = 1;
        } else {
            $advertisements->secure = 0;
        }
        if(isset($req->date_end)){
            $advertisements->date_vip = $req->date_end;
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
        $advertisements->dates = NOW();
        $advertisements->save();
        $advertId = $advertisements->id;

        if(isset($req->images)){
            $imagess = $req->images;
            for ($ii=0; $ii < count($imagess); $ii++) { 
                $ext = explode('/', mime_content_type($imagess[$ii]))[1];
                $imageName = uniqid().'.'.$ext;
                Storage::put('advertisements/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $imagess[$ii])));

                $image = Image::make('storage/advertisements/'.$imageName);
                $watermark = Image::make('assets/images/watermark.png');
                $watermark->resize($image->width(), $image->height());
                // $watermark->resize($image->width() / 6, $image->height() / 6);
                // $watermark->rotate(-45);
                // $image->insert($watermark, 'bottom-right', 10, 10);
                // $image->insert($watermark, 'bottom-left', 10, 10);
                // $image->insert($watermark, 'top-right', 10, 10);
                // $image->insert($watermark, 'top-left', 10, 10);
                $image->insert($watermark, 'center', 0, 0);
                $image->save('storage/advertisements/'.$imageName);
                
                $imageC = new Images;
                $imageC->advertisements_id = $advertId;
                $imageC->image = 'advertisements/'.$imageName;
                $imageC->save();
            }
        } else {
            $imageC = new Images;
            $imageC->advertisements_id = $advertId;
            $imageC->image = '';
            $imageC->save();
        }
        return redirect('/advertisements');
        
    }
    public function editAdvertisements(Request $req, $id){        
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
        // if(!isset($req->images)){
        //     $validator->after(function ($validator) {
        //         $validator->errors()->add('images', "Загрузите фото");
        //     });
        // } 
        $validator->validate(); 

        $advertisements = Advertisements::find($id);
        $advertisements->name = $req->name;
        $advertisements->category_id = $req->category;
        $advertisements->description = $req->description;
        $advertisements->city_id = $req->city;
        
        // Save image (base64)
        if(isset($req->main_image) || isset($req->images)){
            if(isset($req->main_image)){
                $img = $req->main_image;
            } else {
                $img = $req->images;
            }
            $ext = explode('/', mime_content_type($img[0]))[1];
            $imageName = uniqid().'.'.$ext;
            Storage::put('advertisements/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $img[0])));
    
            $image = Image::make('storage/advertisements/'.$imageName);
            $watermark = Image::make('assets/images/watermark.png');
            $watermark->resize($image->width(), $image->height());
            // $watermark->resize($image->width() / 6, $image->height() / 6);
            // $watermark->rotate(-45);
            // $image->insert($watermark, 'bottom-right', 10, 10);
            // $image->insert($watermark, 'bottom-left', 10, 10);
            // $image->insert($watermark, 'top-right', 10, 10);
            // $image->insert($watermark, 'top-left', 10, 10);
            $image->insert($watermark, 'center', 0, 0);
            $image->save('storage/advertisements/'.$imageName);
    
            $advertisements->main_image = 'advertisements/'.$imageName;
        } else {
            $advertisements->main_image = '';
        }
        
        if(isset($req->secureCheckBox)){
            $advertisements->secure = 1;
        } else {
            $advertisements->secure = 0;
        }
        if(isset($req->date_end)){
            $advertisements->date_vip = $req->date_end;
        }
        $advertisements->phone = $req->phone;
        $advertisements->price = $req->price;
        $advertisements->user_id = $req->user;
        $advertisements->status = $req->status;
        $advertisements->status_vip = $req->status_vip;
        $advertisements->secure = $req->secure;
        $advertisements->save();
        $advertId = $advertisements->id;

        if(isset($req->removeImage)){
            $removeImage = $req->removeImage;
            foreach ($removeImage as $rr) {
                Images::where('image', $rr)->delete();
                Storage::delete($rr);
            }
        }

        if(isset($req->images)){
            $imagess = $req->images;
            for ($ii=0; $ii < count($imagess); $ii++) { 
                $ext = explode('/', mime_content_type($imagess[$ii]))[1];
                $imageName = uniqid().'.'.$ext;
                Storage::put('advertisements/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $imagess[$ii])));

                $image = Image::make('storage/advertisements/'.$imageName);
                $watermark = Image::make('assets/images/watermark.png');
                $watermark->resize($image->width(), $image->height());
                // $watermark->resize($image->width() / 6, $image->height() / 6);
                // $watermark->rotate(-45);
                // $image->insert($watermark, 'bottom-right', 10, 10);
                // $image->insert($watermark, 'bottom-left', 10, 10);
                // $image->insert($watermark, 'top-right', 10, 10);
                // $image->insert($watermark, 'top-left', 10, 10);
                $image->insert($watermark, 'center', 0, 0);
                $image->save('storage/advertisements/'.$imageName);

                $imageC = new Images;
                $imageC->advertisements_id = $advertId;
                $imageC->image = 'advertisements/'.$imageName;
                $imageC->save();
            }
        } else {
            $imageC = new Images;
            $imageC->advertisements_id = $advertId;
            $imageC->image = '';
            $imageC->save();
        }
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
