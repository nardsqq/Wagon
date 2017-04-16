<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'tblVehicle';
    protected $primaryKey = 'intVehicleID';
    public $timestamps = false;

    public static $new_rules = [
    	'strVehiclePlateNumber' => 'required|unique_with:tblVehicle,strVehicleModel,intVehicleGrossWeight,intVehicleNetCapacity|max:8',
    	'strVehicleModel' => 'required|max:45',
    ];

    public static $update_rules = [
    	'strVehiclePlateNumber' => 'required|unique_with:tblVehicle,strVehicleModel,intVehicleGrossWeight,intVehicleNetCapacity|max:8',
    	'strVehicleModel' => 'required|max:45',
    ];
}
