<?php

use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;

if (!function_exists('displayPartsInformation')) {
    function displayPartsInformation($uniqueId) {
        $row = GetNgvInfoController::getByUniqueId($uniqueId);
        $kit = $row->kit();
        if($kit->brand && $kit->serial && $kit->type){
            return true;
        }
        return false;
    }
}

if (!function_exists('getKitParts')) {
    function getKitParts($uniqueId) {
        $row = GetNgvInfoController::getByUniqueId($uniqueId);
        $kit = $row->kit();
        if($kit->type === config('ngv_control.kit_type.open_loop.key')){
            return config('ngv_control.parts_for_OL');
        }
        return config('ngv_control.parts');
    }
}
