<?php
namespace BehinNgvControl\App\Http\Controllers\InjectorInfo;

use App\Http\Controllers\Controller;
use BehinInit\App\Http\Controllers\UniqueIDController;
use BehinNgvControl\App\Models\InjectorInfo;
use BehinNgvControl\App\Models\NgvInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetInjectorInfoController extends Controller
{
    public static function getFirstByUniqueId($uniqueId){
        return InjectorInfo::where('ngv_info_unique_id', $uniqueId)->firstOrCreate([
            'ngv_info_unique_id' => $uniqueId
        ]);
    }
}
