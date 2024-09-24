<?php
namespace BehinNgvControl\App\Http\Controllers\KitInfo;

use App\Http\Controllers\Controller;
use BehinFileControl\Controllers\FileController;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreKitInfoController extends Controller
{
    public function store(Request $request){
        $uniqueId = $request->ngv_info_unique_id;
        $row = GetKitInfoController::getFirstByUniqueId($uniqueId);

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
            'msg' => trans("Kit informations stored")
        ]);
    }
}
