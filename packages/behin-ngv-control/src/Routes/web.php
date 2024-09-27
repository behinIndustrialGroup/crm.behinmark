<?php

use BehinNgvControl\App\Http\Controllers\CutoffValveInfo\StoreCutoffValveInfoController;
use BehinNgvControl\App\Http\Controllers\CylinderInfo\StoreCylinderInfoController;
use BehinNgvControl\App\Http\Controllers\EcuInfo\StoreEcuInfoController;
use BehinNgvControl\App\Http\Controllers\FillingValveInfo\StoreFillingValveInfoController;
use BehinNgvControl\App\Http\Controllers\FuelSolenoidInfo\StoreFuelSolenoidInfoController;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use BehinNgvControl\App\Http\Controllers\GetNgvInfoViewController;
use BehinNgvControl\App\Http\Controllers\GetPartialViewController;
use BehinNgvControl\App\Http\Controllers\InjectorInfo\StoreInjectorInfoController;
use BehinNgvControl\App\Http\Controllers\KitInfo\StoreKitInfoController;
use BehinNgvControl\App\Http\Controllers\RegisterFormController;
use BehinNgvControl\App\Http\Controllers\RegulatorInfo\StoreRegulatorInfoController;
use BehinNgvControl\App\Http\Controllers\StoreApprovalsController;
use BehinNgvControl\App\Http\Controllers\VehicleInfo\StoreVehicleInfoController;
use BehinNgvControl\App\Http\Controllers\VehicleOwner\StoreVehicleOwnerController;

use BehinNgvControl\App\Http\Controllers\VehicleOwner\VehicleOwnerFormController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::name('ngvControl.')->prefix('ngv-control')->middleware(['web', 'auth'])->group(function () {
    Route::get('register-form/{uniqueId}', [RegisterFormController::class, 'index'])->name('registerForm');
    Route::any('create-or-edit-form/{modalName}', [RegisterFormController::class, 'openEditModalView'])->name('editModalFrom');

    Route::any('print-ngv-info-view', [GetNgvInfoController::class, 'printView'])->name('printView');
    Route::any('update-part-modal-buttons-view', [GetPartialViewController::class, 'getOpenPartModalButtons'])->name('getOpenPartModalButtons');

    Route::name('vehicleOwner.')->prefix('vehicle-owner')->group(function (){
        Route::any('store', [StoreVehicleOwnerController::class, 'store'])->name('store');
    });

    Route::name('vehicleInfo.')->prefix('vehicle-info')->group(function (){
        Route::any('store', [StoreVehicleInfoController::class, 'store'])->name('store');
    });

    Route::name('cylinderInfo.')->prefix('cylinder-info')->group(function (){
        Route::any('store', [StoreCylinderInfoController::class, 'storeCylinderNo1'])->name('store');
    });

    Route::name('cylinder2Info.')->prefix('cylinder2-info')->group(function (){
        Route::any('store', [StoreCylinderInfoController::class, 'storeCylinderNo2'])->name('store');
    });

    Route::name('cylinder3Info.')->prefix('cylinder3-info')->group(function (){
        Route::any('store', [StoreCylinderInfoController::class, 'storeCylinderNo3'])->name('store');
    });

    Route::name('kitInfo.')->prefix('kit-info')->group(function (){
        Route::any('store', [StoreKitInfoController::class, 'store'])->name('store');
    });

    Route::name('regulatorInfo.')->prefix('regulator-info')->group(function (){
        Route::any('store', [StoreRegulatorInfoController::class, 'storeRegulator'])->name('store');
    });

    Route::name('filling_valveInfo.')->prefix('filling_valve-info')->group(function (){
        Route::any('store', [StoreFillingValveInfoController::class, 'storeFillingValve'])->name('store');
    });

    Route::name('cutoff_valveInfo.')->prefix('cutoff_valve-info')->group(function (){
        Route::any('store', [StoreCutoffValveInfoController::class, 'storeCutoffValve'])->name('store');
    });

    Route::name('ecuInfo.')->prefix('ecu-info')->group(function (){
        Route::any('store', [StoreEcuInfoController::class, 'storeEcu'])->name('store');
    });

    Route::name('fuel_solenoidInfo.')->prefix('fuel_solenoid-info')->group(function (){
        Route::any('store', [StoreFuelSolenoidInfoController::class, 'store'])->name('store');
    });

    Route::name('injectorInfo.')->prefix('injector-info')->group(function (){
        Route::any('store', [StoreInjectorInfoController::class, 'storeInjector'])->name('store');
    });

    Route::name('injector2Info.')->prefix('injector2-info')->group(function (){
        Route::any('store', [StoreInjectorInfoController::class, 'storeInjectorNo2'])->name('store');
    });

    Route::name('approval.')->prefix('approval')->group(function (){
        Route::any('set-supervisor-approval', [StoreApprovalsController::class, 'storeSupervisorApproval'])->name('storeSupervisorApproval');
        Route::any('set-workshop-manager-approval', [StoreApprovalsController::class, 'storeWorkshopManagerApproval'])->name('storeWorkshopManagerApproval');
    });

    Route::name('list.')->prefix('list')->group(function (){
        Route::any('my-list-view', [GetNgvInfoViewController::class, 'getMyListView'])->name('myListView');
        Route::any('my-list', [GetNgvInfoController::class, 'getMyList'])->name('myList');
    });
});
