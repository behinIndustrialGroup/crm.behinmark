<?php

use BehinNgvControl\App\Http\Controllers\GetNgvInfoController;
use BehinNgvControl\App\Http\Controllers\RegisterFormController;
use BehinNgvControl\App\Http\Controllers\VehicleOwner\StoreVehicleOwnerController;
use BehinNgvControl\App\Http\Controllers\VehicleOwner\VehicleOwnerFormController;
use Illuminate\Support\Facades\Route;

Route::name('ngvControl.')->prefix('ngv-control')->middleware(['web', 'auth'])->group(function () {
    Route::get('register-form/{unqiueId?}', [RegisterFormController::class, 'index'])->name('registerForm');
    Route::any('print-ngv-info-view', [GetNgvInfoController::class, 'printView'])->name('printView');

    Route::name('vehicleOwner.')->prefix('vehicle-owner')->group(function (){
        Route::any('create-or-edit-form', [VehicleOwnerFormController::class, 'index'])->name('index');
        Route::any('store', [StoreVehicleOwnerController::class, 'store'])->name('store');
    });
});
