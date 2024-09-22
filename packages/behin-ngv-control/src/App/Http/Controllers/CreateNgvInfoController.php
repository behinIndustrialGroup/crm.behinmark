<?php
namespace BehinNgvControl\App\Http\Controllers;

use App\Http\Controllers\Controller;
use BehinInit\App\Http\Controllers\UniqueIDController;
use BehinNgvControl\App\Models\NgvInfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CreateNgvInfoController extends Controller
{
    public static function create(){
        $lastCount = NgvInfo::count();
        $uniqueId = new UniqueIDController('ngv_informations', 'unique_id', $lastCount);
        $uniqueId::setPrefix("NIGNGV");
        $uniqueId::setJustNumber(true);
        $uniqueId::setSeprator('-');
        $uniqueId = $uniqueId::create();
        return NgvInfo::create([
            'unique_id' => $uniqueId
        ]);
    }
}
