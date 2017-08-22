<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
  protected $table = 'tblServiceType';
  protected $fillable = ['strServTypeName', 'txtServTypeDesc'];
  protected $primaryKey = 'intServTypeID';
  public $timestamps = false;
}
