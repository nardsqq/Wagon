<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{

    protected $table = 'tblvehicletype';
    protected $primaryKey = 'intVehicleTypeNumber'; 
    public $timestamps = false;
    public $incrementing = true;
    
    public static $new_rules = [
        'strVehicleTypeName' => 'required|unique:tblvehicletype|max:45',
        'strDesc' => 'max:25'
    ];

    public static $update_rules = [
        'strVehicleTypeName' => 'required|unique:tblvehicletype|max:45',
        'strDesc' => 'max:25'
    ];
}
