<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\News;
use Image;

class NewsController extends Controller
{
    public function addNews(Request $req){

        $validator = \Validator::make(request()->all(), []);
        if(!isset($req->images)){
            $validator->after(function ($validator) {
                $validator->errors()->add('images', "Загрузите фото");
            });
        } 
        $validator->validate(); 

        $news = new News;
        $news->ru_name = $req->ru_name;
        $news->tm_name = $req->tm_name;
        $news->ru_description = $req->ru_description;
        $news->tm_description = $req->tm_description;

        // Save image (base64)
        $img = $req->images;
        $ext = explode('/', mime_content_type($img[0]))[1];
        $imageName = uniqid().'.'.$ext;
        Storage::put('news/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $img[0])));

        $image = Image::make('storage/news/'.$imageName);
        $watermark = Image::make('assets/images/watermark.png');
        $watermark->resize($image->width() / 6, $image->height() / 6);
        $watermark->rotate(-45);
        $image->insert($watermark, 'bottom-right', 10, 10);
        $image->insert($watermark, 'bottom-left', 10, 10);
        $image->insert($watermark, 'top-right', 10, 10);
        $image->insert($watermark, 'top-left', 10, 10);
        $image->insert($watermark, 'center', 0, 0);
        $image->save('storage/news/'.$imageName);

        $news->image = 'news/'.$imageName;

        $news->save();
        return redirect('/news');
        
    }
    public function editNews(Request $req, $id){
        
        $validator = \Validator::make(request()->all(), []);
        if(!isset($req->images)){
            $validator->after(function ($validator) {
                $validator->errors()->add('images', "Загрузите фото");
            });
        } 
        $validator->validate(); 
        
        $news = News::find($id);
        $news->ru_name = $req->ru_name;
        $news->tm_name = $req->tm_name;
        $news->ru_description = $req->ru_description;
        $news->tm_description = $req->tm_description;

        // Save image (base64)
        if($req->images){
            $img = $req->images;
            $check = explode('/', $img[0]);
            if($check[0] != 'news'){
                $ext = explode('/', mime_content_type($img[0]))[1];
                $imageName = uniqid().'.'.$ext;
                Storage::put('news/'.$imageName, base64_decode(str_replace('data:image/'.$ext.';base64,', '', $img[0])));

                $image = Image::make('storage/news/'.$imageName);
                $watermark = Image::make('assets/images/watermark.png');
                $watermark->resize($image->width() / 6, $image->height() / 6);
                $watermark->rotate(-45);
                $image->insert($watermark, 'bottom-right', 10, 10);
                $image->insert($watermark, 'bottom-left', 10, 10);
                $image->insert($watermark, 'top-right', 10, 10);
                $image->insert($watermark, 'top-left', 10, 10);
                $image->insert($watermark, 'center', 0, 0);
                $image->save('storage/news/'.$imageName);

                $news->image = 'news/'.$imageName;
            }
        }
        
        $news->save();
        return redirect('/news');
    }
    public function statusNews(Request $req, $id){
        $news = News::find($id);
        $news->status = $news->status ? 0 : 1;
        $news->save();
        return back();
    }
    public function deleteNews(Request $req, $id){
        News::find($id)->delete();
        return back();
    }
}