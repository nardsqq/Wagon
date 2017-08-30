<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
	use SoftDeletes;

  	protected $table = 'tblDiscount';
  	protected $fillable = ['strDiscName', 'decDiscValue'];
  	protected $primaryKey = 'intDiscID';
  	public $timestamps = false;

}
