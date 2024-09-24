<?php
namespace BehinNgvControl\App\Http\Controllers\FuelSolenoidInfo;

use App\Http\Controllers\Controller;
use BehinInit\App\Http\Controllers\UniqueIDController;
use BehinNgvControl\App\Models\FuelSolenoidInfo;
use BehinNgvControl\App\Models\NgvInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetFuelSolenoidInfoController extends Controller
{
    public static function getFirstByUniqueId($uniqueId){
        return FuelSolenoidInfo::where('ngv_info_unique_id', $uniqueId)->firstOrCreate([
            'ngv_info_unique_id' => $uniqueId
        ]);
    }
}
