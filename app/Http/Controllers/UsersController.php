<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    public function addUser(Request $req){
        $user = new Users;
        // $user->name = $req->name;
        $user->phone = "+".$req->phone;
        $user->save();
        return redirect('/users');
    }
    public function editUser(Request $req, $id){
        $user = Users::find($id);
        // $user->name = $req->name;
        $user->phone = "+".$req->phone;
        $user->save();
        return redirect('/users');
    }
    public function statusUser(Request $req, $id){
        $user = Users::find($id);
        $user->status = $user->status ? 0 : 1;
        $user->save();
        return back();
    }
    public function deleteUser(Request $req, $id){
        Users::find($id)->delete();
        return back();
    }
}
