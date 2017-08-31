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
    protected $dates = ['deleted_at'];
  	public $timestamps = false;

  	public static $rules = [
        'strDiscName' => 'required|min:2|unique:tblDiscount|max:45|regex:/^[a-z ,.\'-]+$/i',
      	'decDiscValue' => 'required'
    ];
}
