<?php

namespace Behin\Cities\Controllers;

use App\Http\Controllers\Controller;
use Behin\Cities\Models\Country;
use Behin\Cities\Models\Province;

class CountryController extends Controller
{
    public static function all(){
        return Province::get();
    }

    public static function getByName($countryName){
        return Country::where('name', $countryName)->first();
    }

    public static function getById($id){
        return Province::find($id);
    }


    public static function create($province_name){
        return Province::updateOrCreate(
            [
                'name' => $province_name
            ],
            [

            ]
        );
    }
}
