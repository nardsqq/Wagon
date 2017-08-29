<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
	use SoftDeletes;
	
  	protected $table = 'tblWarehouse';
  	protected $fillable = ['strWarehouseName', 'txtWarehouseLocation', 'txtWarehouseDesc'];
  	protected $primaryKey = 'intWarehouseID';
  	public $timestamps = false;

  	public static $rules = [
    	'strWarehouseName' => 'required|min:2|unique:tblWarehouse|max:45|regex:/^[a-z ,.\'-]+$/i',
    	'txtWarehouseLocation' => 'required|min:2|max:50|regex:/^[a-z ,.\'-]+$/i',
      'txtWarehouseDesc' => 'min:2|max:50|regex:/^[a-z ,.\'-]+$/i'
  	];
}
