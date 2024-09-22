<?php

namespace BehinNgvControl\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InjectorInfo extends Model
{
    use HasFactory;
    public $table = 'behin_part_injectors';
    protected $fillable = [
        'ngv_info_unique_id',
        'manufacturer',
        'serial',
        'type',
        'image'
    ];
}
