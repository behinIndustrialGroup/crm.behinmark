<?php 

namespace BehinInit\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UniqueIDController extends Controller
{

    public static function create($table_name, $id_field_name) {
        $unique_id = Str::random(10);
        $row = DB::table($table_name)->where($id_field_name, $unique_id)->first();
        if($row){
            self::create($table_name, $id_field_name);
        }
        return $unique_id;
    }
}