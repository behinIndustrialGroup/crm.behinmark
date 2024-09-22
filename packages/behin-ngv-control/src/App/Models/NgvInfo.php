<?php

namespace BehinNgvControl\App\Models;

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
        'owner_back_national_card'
    ];
}
