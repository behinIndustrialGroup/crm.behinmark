<?php
namespace BehinNgvControl\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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
}
