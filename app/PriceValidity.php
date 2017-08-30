<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceValidity extends Model
{
	use SoftDeletes;

  	protected $table = 'tblPriceValid';
  	protected $fillable = ['strPriceVName', 'strPriceVDuration'];
  	protected $primaryKey = 'intPriceVID';
  	public $timestamps = false;


  	public static $rules = [
        'strPriceVName' => 'required|min:2|unique:tblPriceValid|max:45|regex:/^[a-z ,.\'-]+$/i',
      	'strPriceVDuration' => 'required|min:2|unique:tblPriceValid|max:45|regex:/^[a-z ,.\'-]+$/i'
    ];
}
