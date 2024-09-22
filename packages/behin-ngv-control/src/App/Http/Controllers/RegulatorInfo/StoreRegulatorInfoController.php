<?php
namespace BehinNgvControl\App\Http\Controllers\RegulatorInfo;

use App\Http\Controllers\Controller;
use BehinFileControl\Controllers\FileController;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreRegulatorInfoController extends Controller
{
    public function storeRegulator(Request $request){
        $uniqueId = $request->ngv_info_unique_id;
        $row = GetRegulatorInfoController::getFirstByUniqueId($uniqueId);

        $data = $request->all();
        // $vehicle_card_image = $request->file('vehicle_card_image');
        // if(isset($vehicle_card_image)){
        //     $result = FileController::store($vehicle_card_image, 'ngv-info-docs');
        //     if($result['status'] != 200){
        //         return response()->json($result, $result['status']);
        //     }
        //     $data['vehicle_card_image'] = $result['dir'];
        // }

        // $vehicle_plaque_image = $request->file('vehicle_plaque_image');
        // if(isset($vehicle_plaque_image)){
        //     $result = FileController::store($vehicle_plaque_image, 'ngv-info-docs');
        //     if($result['status'] != 200){
        //         return response()->json($result, $result['status']);
        //     }
        //     $data['vehicle_plaque_image'] = $result['dir'];
        // }

        $row->update($data);
        return response()->json([
            'msg' => trans("Regulator informations stored")
        ]);
    }
}
