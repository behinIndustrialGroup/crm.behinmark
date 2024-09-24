<?php
namespace BehinNgvControl\App\Http\Controllers\InjectorInfo;

use App\Http\Controllers\Controller;
use BehinInit\App\Http\Controllers\UniqueIDController;
use BehinNgvControl\App\Models\FuelSolenoidInfo;
use BehinNgvControl\App\Models\InjectorInfo;
use BehinNgvControl\App\Models\NgvInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetInjectorInfoController extends Controller
{
    public static function getFirstByUniqueId($uniqueId, $autoCreate = true){
        $query = InjectorInfo::where('ngv_info_unique_id', $uniqueId);
        if($autoCreate){
            return $query->firstOrCreate([
                'ngv_info_unique_id' => $uniqueId
            ]);
        }else{
            return $query->first();
        }
    }

    public static function getSecondByUniqueId($uniqueId, $autoCreate = true){
        $query = InjectorInfo::where('ngv_info_unique_id', $uniqueId)->skip(1);
        if($autoCreate){
            return $query->firstOrCreate([
                'ngv_info_unique_id' => $uniqueId
            ]);
        }else{
            return $query->first();
        }
    }
}
