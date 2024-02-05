<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $req){

        $validator = \Validator::make(request()->all(),
            [
                'icon' => 'required',
            ],
            [
                'icon.required' => 'Выберите иконку',
            ] 
        );

        $validator->validate();

        $category = new Category;
        $category->ru_name = $req->ru_name;
        $category->tm_name = $req->tm_name;
        $category->icon = $req->icon;
        if(isset($req->department)){
            $category->parent = $req->department;
        }
        $category->save();
        return redirect('/categories');
    }
    public function editCategory(Request $req, $id){

        $validator = \Validator::make(request()->all(),
            [
                'icon' => 'required',
            ],
            [
                'icon.required' => 'Выберите иконку',
            ] 
        );

        $validator->validate();
        
        $category = Category::find($id);
        $category->ru_name = $req->ru_name;
        $category->tm_name = $req->tm_name;
        $category->icon = $req->icon;
        if(isset($req->department)){
            $category->parent = $req->department;
        }
        $category->save();
        return redirect('/categories');
    }
    public function statusCategory(Request $req, $id){
        $category = Category::find($id);
        $category->status = $category->status ? 0 : 1;
        $category->save();
        return back();
    }
    public function deleteCategory(Request $req, $id){
        Category::find($id)->delete();
        return back();
    }
}
