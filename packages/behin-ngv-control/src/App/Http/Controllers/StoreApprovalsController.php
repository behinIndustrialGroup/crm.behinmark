<?php
namespace BehinNgvControl\App\Http\Controllers;

use App\Http\Controllers\Controller;
use BehinFileControl\Controllers\FileController;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use BehinNgvWorkshopControl\App\Http\Controllers\GetWorkshopController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StoreApprovalsController extends Controller
{
    public function storeSupervisorApproval(Request $request){
        $uniqueId = $request->uniqueId;
        $row = GetNgvInfoController::getByUniqueId($uniqueId);
        if(!$row){
            return response()->json([
                'msg' => trans("There is no record with this unique id")
            ], 402);
        }

        $data = $request->except('uniqueId');

        $retrofit_workshop = GetWorkshopController::getByWorkshopId($request->workshop_id);


        $row->update($data);
        return response()->json([
            'msg' => trans("Information stored")
        ]);
    }
}
