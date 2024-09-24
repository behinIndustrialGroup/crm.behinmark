<?php
namespace BehinNgvControl\App\Http\Controllers\CylinderInfo;

use App\Http\Controllers\Controller;
use BehinInit\App\Http\Controllers\UniqueIDController;
use BehinNgvControl\App\Models\CylinderInfo;
use BehinNgvControl\App\Models\NgvInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetCylinderInfoController extends Controller
{
    public static function getFirstByUniqueId($uniqueId, $autoCreate = true){
        $query = CylinderInfo::where('ngv_info_unique_id', $uniqueId);
        if($autoCreate){
            return $query->firstOrCreate([
                'ngv_info_unique_id' => $uniqueId
            ]);
        }else{
            return $query->first();
        }
    }

    public static function getSecondByUniqueId($uniqueId, $autoCreate = true){
        $query = CylinderInfo::where('ngv_info_unique_id', $uniqueId)->skip(1);
        if($autoCreate){
            return $query->firstOrCreate([
                'ngv_info_unique_id' => $uniqueId
            ]);
        }else{
            return $query->first();
        }

    }

    public static function getThirdByUniqueId($uniqueId, $autoCreate = true){
        $query = CylinderInfo::where('ngv_info_unique_id', $uniqueId)->skip(2);
        if($autoCreate){
            return $query->firstOrCreate([
                'ngv_info_unique_id' => $uniqueId
            ]);
        }else{
            return $query->first();
        }
    }
}
