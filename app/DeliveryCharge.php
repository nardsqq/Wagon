<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryCharge extends Model
{
	use SoftDeletes;

  	protected $table = 'tblDeliveryCharge';
  	protected $fillable = ['strDelCharName', 'strDelCharWeight', 'strDelCharRate'];
  	protected $primaryKey = 'intDelCharID';
  	public $timestamps = false;

  	/*
  	public function prod() 
  	{
  		return $this->hasMany('App\Product');
  	}
  	*/
}
