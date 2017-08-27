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
}
