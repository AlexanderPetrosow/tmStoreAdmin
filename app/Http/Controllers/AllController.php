<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Users;
use App\Models\Category;
use App\Models\Advertisements;
use App\Models\City;
use App\Models\District;
use App\Models\Banner;
use App\Models\News;

class AllController extends Controller
{
    public function auth(Request $req){
        $login = $req->login;
        $pass = $req->password;
        $admin = Admin::all();

        $validator = \Validator::make(request()->all(), 
            [
                'login' => 'required | min:3',
                'password' => 'required | min:8'
            ],
            [
                'login.required' => 'Заполните это поля',
                'login.min' => 'Минимальное количество значений: 3',
                'password.required' => 'Заполните это поля',
                'password.min' => 'Минимальное количество значений: 8',
            ]
        );

        foreach ($admin as $adm) {
            if($login == $adm['login'] && Hash::check($pass, $adm['password'])){
                $req->session()->put('admin', $adm['id']);
                return redirect('/');
            }
        }

        $validator->after(function ($validator) {
            $validator->errors()->add('auth', 'Не правильный логин или пароль');
        });
        $validator->validate();
    }

    public function logout(){
        if(session()->has('admin')){
            session()->pull('admin');
        }
        return redirect('/');
    }

    // Search
    public function search(Request $req){
        $s = $req->search_text;
        $r = '';
        foreach ($s as $t) {
            if($t != null){
                $r = $t;
            }
        }

        $department_name = array();
        switch ($req->type) {
            case 'users':
                $res = Users::where('name', 'like', '%' . $r . '%')->orderBy('updated_at', 'DESC')->get();
                break;

            case 'categories':
                $res = Category::where('ru_name', 'like', '%' . $r . '%')->orderBy('updated_at', 'DESC')->get();
                foreach ($res as $categ) {
                    if($categ['parent'] != 0){    
                        $cat = Category::find($categ['parent']);
                        $department_name[] = $cat['ru_name'];
                    } else {
                        $department_name[] = '';
                    }
                }
                break;

            case 'advertisements':
                $res = Advertisements::where('name', 'like', '%' . $r . '%')->orderBy('updated_at', 'DESC')->get();
                break;

            case 'cities':
                $res = City::where('ru_name', 'like', '%' . $r . '%')->orderBy('updated_at', 'DESC')->get();
                break;

            case 'banners':
                $res = Banner::where('name', 'like', '%' . $r . '%')->orderBy('updated_at', 'DESC')->get();
                break;
            
            case 'news':
                $res = News::where('ru_name', 'like', '%' . $r . '%')->orderBy('updated_at', 'DESC')->get();
                break;
            
            default:
                $res = [];
                break;
        }
        return view($req->type.'.'.$req->type, ['list'=>$res, 'department_name'=>$department_name]);
    }

    function getSubCategory(Request $req){
        $subCategories = Category::where('parent', $req->id)->get();
        $json = json_encode($subCategories);
        return $json;
    }

    function getCities(Request $req){
        $cities = City::where('district', $req->id)->get();
        $json = json_encode($cities);
        return $json;
    }
}
