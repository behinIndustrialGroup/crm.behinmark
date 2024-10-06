<?php

namespace BehinNgvWorkshopControl\App\Http\Controllers;

use App\Http\Controllers\Controller;
use BehinNgvWorkshopControl\App\Models\BehinRetrofitWorkshop;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetWorkshopController extends Controller
{
    public static function getAll()
    {
        return BehinRetrofitWorkshop::get();
    }

    public static function getByWorkshopId($workshop_id)
    {
        return BehinRetrofitWorkshop::find($workshop_id);
    }

    public static function getMyWorkshopIds()
    {
        return BehinRetrofitWorkshop::where('workshop_supervisor_user_id', Auth::id())
        ->orWhere('workshop_manager_user_id', Auth::id())
        ->get('id');
    }
    public static function getMyWorkshopIdsAsSupervisor()
    {
        return BehinRetrofitWorkshop::where('workshop_supervisor_user_id', Auth::id())
        ->get('id');
    }
    public static function getMyWorkshopIdsAsManager()
    {
        return BehinRetrofitWorkshop::where('workshop_manager_user_id', Auth::id())
        ->get('id');
    }
}
