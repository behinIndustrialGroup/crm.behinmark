<?php

use Behin\Cities\Controllers\ProvinceController;

if (!function_exists('getProvincesByCountry')) {
    function getProvincesByCountry($countryName) {
        return ProvinceController::getAllByCountryName($countryName);
    }
}
