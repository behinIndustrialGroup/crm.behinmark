<?php 

namespace BehinVehicleRegistration\App\Http\Controllers;

use App\Http\Controllers\Controller;
use BehinFileControl\Controllers\FileController;
use BehinVehicleRegistration\App\Models\VehicleRegistration;
use Illuminate\Http\Request;

class VehicleRegController extends Controller
{

    function getByUniqueID($unique_id) {
        return VehicleRegistration::where('unique_id', $unique_id)->first();
    }

    function step1(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'nin' => 'required',
            'phone' => 'required',
            'residence_state' => 'required',
        ]);
        $data = $request->all();
        $data['unique_id'] = UniqueIDController::create('unique_id');
        $row = VehicleRegistration::create($data);
        if($row){
            return response()->json([
                'status' => 200,
                'url' => route("vehicleReg.step2Form", ['unique_id'=> $row['unique_id']])
            ]);
        }
        return response(trans(""), 500);
    }

    public function step2Form($unique_id){
        $row = $this->getByUniqueID($unique_id);
        return view('VehicleRegView::register-form-step2')->with([
            'row' => $row
        ]);
    }

    public function step2(Request $request){
        $request->validate([
            'unique_id' => 'required',
            'vehicle_manufacturer' => 'required',
            'vehicle_model' => 'required',
            'vehicle_year' => 'required',
            'vehicle_reg_state' => 'required',
            'vehicle_reg_number' => 'required',
        ]);
        $row = $this->getByUniqueID($request->unique_id);
        
        if(!$row){
            return response("Error",500);
        }
        $row->update($request->all());
        return response()->json([
            'status' => 200,
            'url' => route("vehicleReg.step3Form", ['unique_id'=> $row['unique_id']])
        ]);
    }

    public function step3Form($unique_id){
        return view('VehicleRegView::register-form-step3')->with([
            'unique_id' => $unique_id
        ]);
    }

    public function step3(Request $request){
        $request->validate([
            'unique_id' => 'required',
            'payment_file' => 'required',
        ]);
        $row = $this->getByUniqueID($request->unique_id);
        
        if(!$row){
            return response("Error",500);
        }
        $file = FileController::store($request->file('payment_file'), 'vehicle-registrations-payments');
        if($file['status'] != 200){
            return response($file['message'], 500);
        }
        $row->payment_file = $file['dir'];
        $row->save();
        return response()->json([
            'status' => 200,
            'msg' => view('VehicleRegView::partial.payment-success')
        ]);
    }
}