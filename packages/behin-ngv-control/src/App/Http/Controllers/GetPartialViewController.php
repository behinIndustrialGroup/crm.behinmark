<?php
namespace BehinNgvControl\App\Http\Controllers;

use App\Http\Controllers\Controller;
use BehinInit\App\Http\Controllers\UniqueIDController;
use BehinNgvControl\App\Models\NgvInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetPartialViewController extends Controller
{
    public static function getOpenPartModalButtons(Request $request){
        $row = GetNgvInfoController::getByUniqueId($request->uniqueId);
        return view('BehinNgvControlViews::open-part-modal-buttons')->with([
            'row' => $row
        ]);
    }
}
