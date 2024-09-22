<?php

namespace BehinNgvControl\App\Models;

use BehinNgvControl\App\Http\Controllers\CylinderInfo\GetCylinderInfoController;
use BehinNgvControl\App\Http\Controllers\RegulatorInfo\GetRegulatorInfoController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgvInfo extends Model
{
    use HasFactory;
    public $table = 'ngv_informations';
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

    public function cylinder1(){
        return GetCylinderInfoController::getFirstByUniqueId($this->unique_id);
    }

    public function regulator(){
        return GetRegulatorInfoController::getFirstByUniqueId($this->unique_id);
    }
}
