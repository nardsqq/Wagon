<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasePrice extends Model
{
  protected $table = 'tblPrice';
  protected $fillable = ['strBasePriceName', 'txtBasePriceDesc'];
  protected $primaryKey = 'intBasePriceID';
  public $timestamps = false;
}
