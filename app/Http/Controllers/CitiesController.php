<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CitiesController extends Controller
{
    public function addCity(Request $req){

        $validator = \Validator::make(request()->all(),
            [
                'district' => 'required',
            ],
            [
                'district.required' => 'Выберите велаят',
            ] 
        );

        $validator->validate();

        $city = new City;
        $city->ru_name = $req->ru_name;
        $city->tm_name = $req->tm_name;
        $city->district = $req->district;
        $city->save();
        return redirect('/cities');
    }
    public function editCity(Request $req, $id){

        $validator = \Validator::make(request()->all(),
            [
                'district' => 'required',
            ],
            [
                'district.required' => 'Выберите велаят',
            ]  
        );

        $validator->validate();
        
        $city = City::find($id);
        $city->ru_name = $req->ru_name;
        $city->tm_name = $req->tm_name;
        $city->district = $req->district;
        $city->save();
        return redirect('/cities');
    }
    public function statusCity(Request $req, $id){
        $city = City::find($id);
        $city->status = $city->status ? 0 : 1;
        $city->save();
        return back();
    }
    public function deleteCity(Request $req, $id){
        City::find($id)->delete();
        return back();
    }
}
