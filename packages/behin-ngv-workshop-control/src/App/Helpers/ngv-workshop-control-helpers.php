<?php

use App\Models\User;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use BehinNgvWorkshopControl\App\Http\Controllers\GetWorkshopController;

if (!function_exists('getAllRetrofits')) {
    function getAllRetrofits() {
        $rows = GetWorkshopController::getAll();
        return $rows;
    }
}
