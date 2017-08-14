<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
  protected $table = 'tblWarehouse';
  protected $primaryKey = 'intWarehouseID';
  public $timestamps = false;
}
