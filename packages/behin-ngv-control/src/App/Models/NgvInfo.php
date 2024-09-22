<?php

namespace BehinNgvControl\App\Models;

use BehinNgvControl\App\Http\Controllers\CutoffValveInfo\GetCutoffValveInfoController;
use BehinNgvControl\App\Http\Controllers\CylinderInfo\GetCylinderInfoController;
use BehinNgvControl\App\Http\Controllers\EcuInfo\GetEcuInfoController;
use BehinNgvControl\App\Http\Controllers\FillingValveInfo\GetFillingValveInfoController;
use BehinNgvControl\App\Http\Controllers\InjectorInfo\GetInjectorInfoController;
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
        'vehicle_plaque_image'
    ];

    public function __construct()
    {
        $this->parts = config('ngv_control.parts');
    }



    public function cylinder1(){
        return GetCylinderInfoController::getFirstByUniqueId($this->unique_id);
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

    public function injector(){
        return GetInjectorInfoController::getFirstByUniqueId($this->unique_id);
    }
}
