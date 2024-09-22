<?php

namespace Behin\Cities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;
    public $table = "provinces";
    protected $fillable = [
        'country_id',
        'name'
    ];
}
