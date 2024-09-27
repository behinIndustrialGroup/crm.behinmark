<?php
namespace BehinNgvControl\App\Http\Controllers\VehicleOwner;

use App\Http\Controllers\Controller;
use BehinFileControl\Controllers\FileController;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use BehinNgvWorkshopControl\App\Http\Controllers\GetWorkshopController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StoreVehicleOwnerController extends Controller
{
    public function store(Request $request){
        $uniqueId = $request->uniqueId;
        $row = GetNgvInfoController::getByUniqueId($uniqueId);
        if(!$row){
            return response()->json([
                'msg' => trans("There is no record with this unique id")
            ], 402);
        }

        $data = $request->except('uniqueId');

        $data['retrofit_workshop'] = GetWorkshopController::getByWorkshopId($request->workshop_id)?->name;

        $personal_image = $request->file('owner_personal_image');
        if(isset($personal_image)){
            $result = FileController::store($personal_image, 'ngv-info-docs');
            if($result['status'] != 200){
                return response()->json($result, $result['status']);
            }
            $data['owner_personal_image'] = $result['dir'];
        }

        $owner_front_national_card = $request->file('owner_owner_front_national_card');
        if(isset($owner_front_national_card)){
            $result = FileController::store($owner_front_national_card, 'ngv-info-docs');
            if($result['status'] != 200){
                return response()->json($result, $result['status']);
            }
            $data['owner_owner_front_national_card'] = $result['dir'];
        }

        $owner_back_national_card = $request->file('owner_owner_back_national_card');
        if(isset($owner_back_national_card)){
            $result = FileController::store($owner_back_national_card, 'ngv-info-docs');
            if($result['status'] != 200){
                return response()->json($result, $result['status']);
            }
            $data['owner_owner_back_national_card'] = $result['dir'];
        }

        $row->update($data);
        return response()->json([
            'msg' => trans("Information stored")
        ]);
    }
}
