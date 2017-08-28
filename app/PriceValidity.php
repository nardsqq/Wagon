<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceValidity extends Model
{
  protected $table = 'tblPriceValid';
  protected $fillable = ['strPriceValName', 'strPriceVDuration'];
  protected $primaryKey = 'intPriceValID';
  public $timestamps = false;
}
