<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
  protected $table = 'tblDiscount';
  protected $fillable = ['strDiscName', 'decDiscValue'];
  protected $primaryKey = 'intDiscID';
  public $timestamps = false;
}
