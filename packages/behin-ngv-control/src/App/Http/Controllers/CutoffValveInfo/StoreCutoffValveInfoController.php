<?php
namespace BehinNgvControl\App\Http\Controllers\CutoffValveInfo;

use App\Http\Controllers\Controller;
use BehinFileControl\Controllers\FileController;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreCutoffValveInfoController extends Controller
{
    public function storeCutoffValve(Request $request){
        $uniqueId = $request->ngv_info_unique_id;
        $row = GetCutoffValveInfoController::getFirstByUniqueId($uniqueId);

        $data = $request->all();
        $image = $request->file('image');
        if(isset($image)){
            $result = FileController::store($image, 'ngv-info-docs');
            if($result['status'] != 200){
                return response()->json($result, $result['status']);
            }
            $data['image'] = $result['dir'];
        }

        $row->update($data);
        return response()->json([
            'msg' => trans("Filling Valve informations stored")
        ]);
    }
}
