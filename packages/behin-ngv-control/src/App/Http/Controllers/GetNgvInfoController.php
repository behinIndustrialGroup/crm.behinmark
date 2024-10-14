<?php

namespace BehinNgvControl\App\Http\Controllers;

use App\Http\Controllers\Controller;
use BehinInit\App\Http\Controllers\UniqueIDController;
use BehinNgvControl\App\Models\NgvInfo;
use BehinNgvWorkshopControl\App\Http\Controllers\GetWorkshopController;
use BehinUserRoles\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetNgvInfoController extends Controller
{
    public static function getByUniqueId($uniqueId)
    {
        return NgvInfo::where('unique_id', $uniqueId)->first();
    }

    public static function getMyList(Request $request)
    {
        $user = User::find(Auth::id());
        $myWorkshopIds = GetWorkshopController::getMyWorkshopIds()->pluck('id');
        $rows = NgvInfo::where(function($query) use ($myWorkshopIds, $user){
            $query->whereIn('workshop_id', $myWorkshopIds);
            $query->orWhere('registeror_user_id', $user->id);
        });
        if($request->get_data == 'all'){
            $rows = $rows->get();
        }
        elseif($user->role_id == 1){
            // As an Admin
            $rows = NgvInfo::get();
        }
        elseif($user->role_id == 2){
            // As a Supervisor
            $rows = $rows->where(function($query) use($user){
                $query->where('supervisor_approval', 0);
                $query->orWhere(function($query) use($user){
                    $query->where('registeror_user_id', $user->id);
                    $query->where('registeror_approval', 0);
                });
            })->get();
            // Log::info(vsprintf(str_replace('?', '%s', $rows->toSql()), $rows->getBindings()));
        }
        elseif($user->role_id == 4){
            // As a Workshop Manager
            $rows = $rows->where('workshop_manager_approval', 0)->get();

        }
        elseif($user->role_id == 3){
            // As an Operator
            $rows = $rows->where('registeror_approval', 0)->get();
        }else{
            return [
                'data' => []
            ];
        }
        $rows = $rows->each(function ($row) {
                $workshop = $row->workshop();
                // if($workshop->registeror_user_id == Auth::id()){
                //     $row->role = 'Operator';
                //     $row->in_progress = !$row->registeror_approval;
                // }
                // if($workshop->workshop_supervisor_user_id == Auth::id()){
                //     $row->role = 'Supervisor';
                //     $row->in_progress = !$row->supervisor_approval;
                // }
                // if($workshop->workshop_manager_user_id == Auth::id()){
                //     $row->role = 'Workshop Manager';
                //     $row->in_progress = !$row->workshop_manager_approval;
                // }
                $row->status = self::getNgvInfoStatus($row);
                $row->registeror = $row->registeror();
                $row->workshop = $workshop;
            });
        return [
            'data' => $rows
        ];
    }

    public static function getNgvInfoStatus($row){
        if(!$row->registeror_approval){
            return "Awaiting operator approval";
        }
        if(!$row->supervisor_approval){
            return "Awaiting supervisor approval";
        }
        if(!$row->workshop_manager_approval){
            return "Awaiting workshop manager approval";
        }
        return "Completed";
    }

    public static function printView(Request $request)
    {
        $row = self::getByUniqueId($request->uniqueId);
        return view('BehinNgvControlViews::print-info')->with([
            'row' => $row
        ]);
    }
}
