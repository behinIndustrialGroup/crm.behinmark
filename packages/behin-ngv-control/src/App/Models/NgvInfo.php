<?php

namespace BehinNgvControl\App\Models;

use BehinNgvControl\App\Http\Controllers\CutoffValveInfo\GetCutoffValveInfoController;
use BehinNgvControl\App\Http\Controllers\CylinderInfo\GetCylinderInfoController;
use BehinNgvControl\App\Http\Controllers\EcuInfo\GetEcuInfoController;
use BehinNgvControl\App\Http\Controllers\FillingValveInfo\GetFillingValveInfoController;
use BehinNgvControl\App\Http\Controllers\FuelSolenoidInfo\GetFuelSolenoidInfoController;
use BehinNgvControl\App\Http\Controllers\InjectorInfo\GetInjectorInfoController;
use BehinNgvControl\App\Http\Controllers\KitInfo\GetKitInfoController;
use BehinNgvControl\App\Http\Controllers\RegulatorInfo\GetRegulatorInfoController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgvInfo extends Model
{
    use HasFactory;
    public $table = 'ngv_informations';
    protected $parts;
    protected $fillable = [
        'unique_id',
        'owner_firstname',
        'owner_lastname',
        'owner_nin',
        'owner_phone',
        'owner_residence_state',
        'owner_personal_image',
        'owner_front_national_card',
        'owner_back_national_card',
        'vehicle_manufacturer',
        'vehicle_model',
        'vehicle_produce_year',
        'vehicle_plate_state',
        'vehicle_plate_number',
        'vehicle_card_image',
        'vehicle_plaque_image',
        'convertion_program',
        'registeror_user_id',
        'retrofit_workshop',
        'vehicle_vin'
    ];

    public function kit(){
        return GetKitInfoController::getFirstByUniqueId($this->unique_id);
    }

    public function cylinder1($autoCreate = true){
        return GetCylinderInfoController::getFirstByUniqueId($this->unique_id, $autoCreate);
    }

    public function cylinder2($autoCreate = true){
        return GetCylinderInfoController::getSecondByUniqueId($this->unique_id, $autoCreate);
    }

    public function cylinder3($autoCreate = true){
        return GetCylinderInfoController::getThirdByUniqueId($this->unique_id, $autoCreate);
    }

    public function regulator(){
        return GetRegulatorInfoController::getFirstByUniqueId($this->unique_id);
    }

    public function filling_valve(){
        return GetFillingValveInfoController::getFirstByUniqueId($this->unique_id);
    }

    public function cutoff_valve(){
        return GetCutoffValveInfoController::getFirstByUniqueId($this->unique_id);
    }

    public function ecu(){
        return GetEcuInfoController::getFirstByUniqueId($this->unique_id);
    }

    public function fuel_solenoid(){
        return GetFuelSolenoidInfoController::getFirstByUniqueId($this->unique_id);
    }

    public function injector($autoCreate = true){
        return GetInjectorInfoController::getFirstByUniqueId($this->unique_id, $autoCreate);
    }

    public function injector2($autoCreate = true){
        return GetInjectorInfoController::getSecondByUniqueId($this->unique_id, $autoCreate);
    }
}
