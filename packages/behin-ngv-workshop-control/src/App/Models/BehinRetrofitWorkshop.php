<?php

namespace BehinNgvWorkshopControl\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BehinRetrofitWorkshop extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'behin_retrofit_workshops';
    protected $parts;
    protected $fillable = [
        'continent_id',
        'country_id',
        'province_id',
        'city_id',
        'name',
        'workshop_manager_user_id',
        'workshop_supervisor_user_id',
        'address',
        'location',
        'phone',
        'website',
        'instagram',
        'twitter',
        'linkedin'
    ];
}
