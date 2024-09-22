<?php
namespace BehinNgvControl\App\Http\Controllers;

use App\Http\Controllers\Controller;
use BehinInit\App\Http\Controllers\UniqueIDController;
use BehinNgvControl\App\Models\NgvInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetNgvInfoController extends Controller
{
    public static function getByUniqueId($uniqueId){
        return NgvInfo::where('unique_id', $uniqueId)->first();
    }

    public static function printView(Request $request){
        $row = self::getByUniqueId($request->uniqueId);
        return view('BehinNgvControlViews::print-info')->with([
            'row' => $row
        ]);
    }
}
