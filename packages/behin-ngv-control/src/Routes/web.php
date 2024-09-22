<?php

use BehinNgvControl\App\Http\Controllers\CylinderInfo\StoreCylinderInfoController;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use BehinNgvControl\App\Http\Controllers\RegisterFormController;
use BehinNgvControl\App\Http\Controllers\RegulatorInfo\StoreRegulatorInfoController;
use BehinNgvControl\App\Http\Controllers\VehicleInfo\StoreVehicleInfoController;
use BehinNgvControl\App\Http\Controllers\VehicleOwner\StoreVehicleOwnerController;
use BehinNgvControl\App\Http\Controllers\VehicleOwner\VehicleOwnerFormController;
use Illuminate\Support\Facades\Route;

Route::name('ngvControl.')->prefix('ngv-control')->middleware(['web', 'auth'])->group(function () {
    Route::get('register-form/{unqiueId?}', [RegisterFormController::class, 'index'])->name('registerForm');
    Route::any('create-or-edit-form/{modalName}', [RegisterFormController::class, 'openEditModalView'])->name('editModalFrom');

    Route::any('print-ngv-info-view', [GetNgvInfoController::class, 'printView'])->name('printView');

    Route::name('vehicleOwner.')->prefix('vehicle-owner')->group(function (){
        Route::any('store', [StoreVehicleOwnerController::class, 'store'])->name('store');
    });

    Route::name('vehicleInfo.')->prefix('vehicle-info')->group(function (){
        Route::any('store', [StoreVehicleInfoController::class, 'store'])->name('store');
    });

    Route::name('cylinderInfo.')->prefix('cylinder-info')->group(function (){
        Route::any('store', [StoreCylinderInfoController::class, 'storeCylinderNo1'])->name('store');
    });

    Route::name('regulatorInfo.')->prefix('regulator-info')->group(function (){
        Route::any('store', [StoreRegulatorInfoController::class, 'storeRegulator'])->name('store');
    });
});
