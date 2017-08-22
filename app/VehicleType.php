<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
  protected $table = 'tblVehicleType';
  protected $fillable = ['strVehiTypeName', 'txtVehiTypeDesc'];
  protected $primaryKey = 'intVehiTypeID';
  public $timestamps = false;
}
