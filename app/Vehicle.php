<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use SoftDeletes;

    protected $table = 'tblVehicle';
    protected $fillable = 
    [
	    'intV_VehiType_ID', 
	    'strVehiModel', 
	    'strVehiPlateNumber', 
	    'strVehiVIN',
	    'intVehiNetCapacity',
	    'intVehiGrossweight'
    ];
    protected $primaryKey = 'intVehiID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function vehitypes() 
    {
      return $this->belongsTo('App\VehicleType', 'intV_VehiType_ID');
    }

    public static $rules = [
      'strVehiPlateNumber' => 'required|max:45|unique:tblVehicle',
      'strVehiVIN' => 'required'
    ];
}
