<?php

namespace BehinNgvControl\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CylinderInfo extends Model
{
    use HasFactory;
    public $table = 'behin_part_cylinders';
    protected $fillable = [
        'ngv_info_unique_id',
        'manufacturer',
        'serial',
        'type',
        'produce_date',
        'expire_date',
        'valve_manufacturer',
        'valve_serial',
        'valve_type'
    ];
}
