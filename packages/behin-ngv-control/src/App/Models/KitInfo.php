<?php

namespace BehinNgvControl\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitInfo extends Model
{
    use HasFactory;
    public $table = 'behin_part_kits';
    protected $fillable = [
        'ngv_info_unique_id',
        'brand',
        'serial',
        'type',
        'image'
    ];
}
