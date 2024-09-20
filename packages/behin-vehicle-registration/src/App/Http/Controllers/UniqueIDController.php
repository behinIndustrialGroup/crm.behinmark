<?php 

namespace BehinVehicleRegistration\App\Http\Controllers;

use App\Http\Controllers\Controller;
use BehinVehicleRegistration\App\Models\VehicleRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UniqueIDController extends Controller
{

    public static function create($id_field_name) {
        $unique_id = Str::random(10);
        $row = VehicleRegistration::where($id_field_name, $unique_id)->first();
        if($row){
            self::create($id_field_name);
        }
        return $unique_id;
    }
}