<?php
namespace BehinNgvControl\App\Http\Controllers\KitInfo;

use App\Http\Controllers\Controller;
use BehinInit\App\Http\Controllers\UniqueIDController;
use BehinNgvControl\App\Models\KitInfo;
use BehinNgvControl\App\Models\NgvInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetKitInfoController extends Controller
{
    public static function getFirstByUniqueId($uniqueId){
        return KitInfo::where('ngv_info_unique_id', $uniqueId)->firstOrCreate([
            'ngv_info_unique_id' => $uniqueId
        ]);
    }
}
