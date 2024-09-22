<?php
namespace BehinNgvControl\App\Http\Controllers\VehicleOwner;

use App\Http\Controllers\Controller;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleOwnerFormController extends Controller
{
    public function index(Request $request){
        $uniqueId = $request->uniqueId;
        $row = GetNgvInfoController::getByUniqueId($uniqueId);
        return view('BehinNgvControlViews::vehicle-owner.index')->with([
            'row' => $row
        ]);
    }
}
