<?php
namespace BehinNgvControl\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisterFormController extends Controller
{
    public function index($uniqueId = null){
        if(!$uniqueId){
            $uniqueId = CreateNgvInfoController::create()->unique_id;
            return redirect()->route('ngvControl.registerForm', [ 'unqiueId' => $uniqueId ]);
        }
        $row = GetNgvInfoController::getByUniqueId($uniqueId);
        return view('BehinNgvControlViews::register-form')->with([
            'row' => $row
        ]);
    }

    public static function openEditModalView(Request $request, $modalName){
        $uniqueId = $request->uniqueId;
        $row = GetNgvInfoController::getByUniqueId($uniqueId);
        return view("BehinNgvControlViews::edit-modals.$modalName")->with([
            'row' => $row
        ]);
    }
}
