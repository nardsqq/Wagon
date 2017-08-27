<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleType extends Model
{
	use SoftDeletes;
	
  	protected $table = 'tblVehicleType';
  	protected $fillable = ['strVehiTypeName', 'txtVehiTypeDesc'];
  	protected $primaryKey = 'intVehiTypeID';
  	public $timestamps = false;
}
