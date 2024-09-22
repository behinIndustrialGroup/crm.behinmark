<?php

use Behin\Cities\Controllers\ProvinceController;
use Illuminate\Support\Facades\Route;

Route::name('city.')->prefix('city')->middleware(['web'])->group(function(){

});

Route::name('province.')->prefix('province')->middleware(['web'])->group(function(){
    Route::get('all', [ProvinceController::class ,'all'])->name('all');
    Route::get('all-by-country-name/{countryName}', [ProvinceController::class ,'getAllByCountryName'])->name('getAllByCountryName');

});
