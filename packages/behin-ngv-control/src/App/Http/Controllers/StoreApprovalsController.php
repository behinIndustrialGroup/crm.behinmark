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
    public function storeRegisterorApproval(Request $request){
        $uniqueId = $request->uniqueId;
        $row = GetNgvInfoController::getByUniqueId($uniqueId);
        if(!$row){
            return response()->json([
                'msg' => trans("There is no record with this unique id")
            ], 402);
        }

        $data = $request->only('registeror_approval');

        if(Auth::id() != $row->registeror_user_id){
            return response()->json([
                'msg' => trans("You are not registeror of this form")
            ], 403);
        }

        $row->update($data);
        return response()->json([
            'msg' => trans("Information stored")
        ]);
    }

    public function storeSupervisorApproval(Request $request){
        $uniqueId = $request->uniqueId;
        $row = GetNgvInfoController::getByUniqueId($uniqueId);
        if(!$row){
            return response()->json([
                'msg' => trans("There is no record with this unique id")
            ], 402);
        }

        $data = $request->only('supervisor_approval');

        $retrofit_workshop = GetWorkshopController::getByWorkshopId($row->workshop_id);
        if(Auth::id() != $retrofit_workshop->workshop_supervisor_user_id){
            return response()->json([
                'msg' => trans("You are not supervisor of this workshop")
            ], 403);
        }

        $data['approver_supervisor_user_id'] = Auth::id();
        $row->update($data);
        return response()->json([
            'msg' => trans("Information stored")
        ]);
    }

    public function storeWorkshopManagerApproval(Request $request){
        $uniqueId = $request->uniqueId;
        $row = GetNgvInfoController::getByUniqueId($uniqueId);
        if(!$row){
            return response()->json([
                'msg' => trans("There is no record with this unique id")
            ], 402);
        }

        $data = $request->only('workshop_manager_approval');

        $retrofit_workshop = GetWorkshopController::getByWorkshopId($row->workshop_id);
        if(Auth::id() != $retrofit_workshop->workshop_manager_user_id){
            return response()->json([
                'msg' => trans("You are not workshop manager of this workshop")
            ], 403);
        }

        $data['approver_workshop_manager_user_id'] = Auth::id();
        $row->update($data);
        return response()->json([
            'msg' => trans("Information stored")
        ]);
    }
}
