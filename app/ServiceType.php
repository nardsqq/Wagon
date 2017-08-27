<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceType extends Model
{
	use SoftDeletes;
	
  	protected $table = 'tblServiceType';
  	protected $fillable = ['strServTypeName', 'txtServTypeDesc'];
  	protected $primaryKey = 'intServTypeID';
  	public $timestamps = false;
}
