<?php 

namespace BehinVehicleRegistration\App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleRegistration extends Model
{
    public $table = 'vehicle_registrations';
    protected $fillable = [
        'unique_id','firstname', 'lastname', 'nin', 'phone', 'residence_state', 
        'vehicle_manufacturer', 'vehicle_model', 'vehicle_year', 'vehicle_reg_state', 'vehicle_reg_number', 
        'payment_file', 'price', 'authority', 'payment_status', 'payment_date'
    ];
}