<?php

namespace Behin\Cities\Controllers;

use App\Http\Controllers\Controller;
use Behin\Cities\Models\Province;

class ProvinceController extends Controller
{
    public static function all(){
        return Province::get();
    }

    public static function getAllByCountryName($countryName){
        $country = CountryController::getByName($countryName);

        return Province::where('country_id', $country->id)->get();
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
