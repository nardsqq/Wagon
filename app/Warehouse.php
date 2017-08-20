<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
  protected $table = 'tblWarehouse';
  protected $fillable = ['strWarehouseName', 'txtWarehouseLocation', 'txtWarehouseDesc'];
  protected $primaryKey = 'intWarehouseID';
  public $timestamps = false;
}