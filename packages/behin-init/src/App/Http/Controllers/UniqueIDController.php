<?php

namespace BehinInit\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UniqueIDController extends Controller
{
    protected static $tableName;
    protected static $uniqueIdFieldName;
    protected static $justNumber = false;
    protected static $length = 5;
    protected static $prefix = '';
    protected static $dynamicPart;
    protected static $seprator = '';
    protected static $addCounterToEnd = true;
    protected static $lastCounterNumber;

    function __construct($tableName, $uniqueIdFieldName, $lastCounterNumber = 0)
    {
        self::$tableName = $tableName;
        self::$uniqueIdFieldName = $uniqueIdFieldName;
        self::$dynamicPart = Carbon::now()->format('Ymd');
        if(self::$addCounterToEnd){
            self::$lastCounterNumber = (string)($lastCounterNumber +1);
        }
    }

    public static function setTableName($tableName){
        self::$tableName = $tableName;
    }

    public static function setUniqueIdFieldName($uniqueIdFieldName){
        self::$uniqueIdFieldName = $uniqueIdFieldName;
    }

    public static function setJustNumber($justNumber){
        self::$justNumber = $justNumber;
    }

    public static function setLength($length){
        self::$length = $length;
    }

    public static function setPrefix($prefix){
        self::$prefix = $prefix;
    }

    public static function setDynamicPart($dynamicPart){
        self::$dynamicPart = Carbon::now()->format(self::$dynamicPart);
    }

    public static function setSeprator($seprator){
        self::$seprator = $seprator;
    }

    public static function create(){
        $s = '';
        $code = self::$justNumber ? (string)rand(pow(10, self::$length - 1), pow(10, self::$length) - 1) : Str::random(self::$length);
        $unique_id = self::$prefix. self::$seprator . self::$dynamicPart . self::$seprator . $code;
        $unique_id .= self::$addCounterToEnd ? self::$seprator . self::$lastCounterNumber : '';
        $row = DB::table(self::$tableName)->where(self::$uniqueIdFieldName, $unique_id)->first();
        if($row){
            self::create();
        }
        return $unique_id;
    }
}
