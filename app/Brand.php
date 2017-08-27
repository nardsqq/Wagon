<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
	use SoftDeletes;

  	protected $table = 'tblBrand';
  	protected $fillable = ['strBrandName', 'txtBrandDesc'];
  	protected $primaryKey = 'intBrandID';
  	public $timestamps = false;
}
