<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModeOfPayment extends Model
{
	use SoftDeletes;

  	protected $table = 'tblModeOfPayment';
  	protected $fillable = ['strMODName'];
  	protected $primaryKey = 'intMODID';
  	public $timestamps = false;

  	/*
  	public function prod() 
  	{
  		return $this->hasMany('App\Product');
  	}
  	*/
}
