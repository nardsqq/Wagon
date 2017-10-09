<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleRequest extends Model
{
    use SoftDeletes;

    protected $table = 'tblVehicleRequest';
    protected $fillable = ['strVehiReqLocation', 'datDeparture','datEstReturn', 'txtVehiReqPurpose'];
    protected $primaryKey = 'intVehiReqID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
s

    public static $rules = [
        'strVehiReqLocation' => 'required',
        'datDeparture' => 'required',
        'datEstReturn' => 'required'
    ];
}
