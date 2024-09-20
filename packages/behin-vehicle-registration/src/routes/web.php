<?php

use BehinVehicleRegistration\App\Http\Controllers\VehicleRegController;
use Illuminate\Support\Facades\Route;

Route::name('vehicleReg.')->prefix('vehicle-registration')->group(function(){
    Route::post('/step1', [VehicleRegController::class, 'step1'])->name('step1');
    Route::get('/step2/{unique_id}', [VehicleRegController::class, 'step2Form'])->name('step2Form');
    Route::post('/step2', [VehicleRegController::class, 'step2'])->name('step2');
    Route::get('/step3/{unique_id}', [VehicleRegController::class, 'step3Form'])->name('step3Form');
    Route::post('/step3', [VehicleRegController::class, 'step3'])->name('step3');

});
