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
    protected $dates = ['deleted_at'];
  	public $timestamps = false;

    public function vehicles() 
    {
      return $this->hasMany('App\Vehicle');
    }

  	public static $rules = [
        'strVehiTypeName' => 'required|min:2|unique:tblVehicleType|max:45|regex:/^[a-z ,.\'-]+$/i',
        'txtVehiTypeDesc' => 'min:2|max:50|regex:/^[a-z ,.\'-]+$/i'
    ];
}
