<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryCharge extends Model
{
	use SoftDeletes;

  	protected $table = 'tblDeliveryCharge';
  	protected $fillable = ['strDelCharName', 'decDelCharWeight', 'decDelCharRate'];
  	protected $primaryKey = 'intDelCharID';
    protected $dates = ['deleted_at'];
  	public $timestamps = false;

  	public static $rules = [
        'strDelCharName' => 'required|min:2|unique:tblDeliveryCharge|max:45|regex:/^[a-z ,.\'-]+$/i',
      	'strDelCharWeight' => 'required',
      	'strDelCharRate' => 'required'
    ];
}
