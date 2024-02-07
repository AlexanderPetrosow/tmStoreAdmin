<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
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
}
