<?php
namespace BehinNgvControl\App\Http\Controllers\VehicleOwner;

use App\Http\Controllers\Controller;
use BehinFileControl\Controllers\FileController;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $personal_image = $request->file('owner_personal_image');
        $result = FileController::store($personal_image, 'ngv-info-docs');
        if($result['status'] != 200){
            return response()->json($result, $result['status']);
        }
        $data['owner_personal_image'] = $result['dir'];
        $row->update($data);
        return response()->json([
            'msg' => trans("Vehicle owner informations stored")
        ]);
    }
}
