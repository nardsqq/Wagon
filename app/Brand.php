<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  protected $table = 'tblBrand';
  protected $fillable = ['strBrandName', 'txtBrandDesc'];
  protected $primaryKey = 'intBrandID';
  public $timestamps = false;
}
