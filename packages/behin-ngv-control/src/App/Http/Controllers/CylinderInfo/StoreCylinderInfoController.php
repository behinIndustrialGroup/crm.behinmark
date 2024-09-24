<?php
namespace BehinNgvControl\App\Http\Controllers\CylinderInfo;

use App\Http\Controllers\Controller;
use BehinFileControl\Controllers\FileController;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreCylinderInfoController extends Controller
{
    public function storeCylinderNo1(Request $request){
        $uniqueId = $request->ngv_info_unique_id;
        $row = GetCylinderInfoController::getFirstByUniqueId($uniqueId);

        $data = $request->all();
        $cylinder_image = $request->file('cylinder_image');
        if(isset($cylinder_image)){
            $result = FileController::store($cylinder_image, 'ngv-info-docs');
            if($result['status'] != 200){
                return response()->json($result, $result['status']);
            }
            $data['cylinder_image'] = $result['dir'];
        }

        $valve_image = $request->file('valve_image');
        if(isset($valve_image)){
            $result = FileController::store($valve_image, 'ngv-info-docs');
            if($result['status'] != 200){
                return response()->json($result, $result['status']);
            }
            $data['valve_image'] = $result['dir'];
        }

        $row->update($data);
        return response()->json([
            'msg' => trans("Cylinder informations stored")
        ]);
    }

    public function storeCylinderNo2(Request $request){
        $uniqueId = $request->ngv_info_unique_id;
        $row = GetCylinderInfoController::getSecondByUniqueId($uniqueId);

        $data = $request->all();
        $cylinder_image = $request->file('cylinder_image');
        if(isset($cylinder_image)){
            $result = FileController::store($cylinder_image, 'ngv-info-docs');
            if($result['status'] != 200){
                return response()->json($result, $result['status']);
            }
            $data['cylinder_image'] = $result['dir'];
        }

        $valve_image = $request->file('valve_image');
        if(isset($valve_image)){
            $result = FileController::store($valve_image, 'ngv-info-docs');
            if($result['status'] != 200){
                return response()->json($result, $result['status']);
            }
            $data['valve_image'] = $result['dir'];
        }

        $row->update($data);
        return response()->json([
            'msg' => trans("Cylinder informations stored")
        ]);
    }

    public function storeCylinderNo3(Request $request){
        $uniqueId = $request->ngv_info_unique_id;
        $row = GetCylinderInfoController::getThirdByUniqueId($uniqueId);

        $data = $request->all();
        $cylinder_image = $request->file('cylinder_image');
        if(isset($cylinder_image)){
            $result = FileController::store($cylinder_image, 'ngv-info-docs');
            if($result['status'] != 200){
                return response()->json($result, $result['status']);
            }
            $data['cylinder_image'] = $result['dir'];
        }

        $valve_image = $request->file('valve_image');
        if(isset($valve_image)){
            $result = FileController::store($valve_image, 'ngv-info-docs');
            if($result['status'] != 200){
                return response()->json($result, $result['status']);
            }
            $data['valve_image'] = $result['dir'];
        }

        $row->update($data);
        return response()->json([
            'msg' => trans("Cylinder informations stored")
        ]);
    }
}
