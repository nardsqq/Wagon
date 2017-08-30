<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermsOfPayment extends Model
{
	use SoftDeletes;

  	protected $table = 'tblTermsOfPayment';
  	protected $fillable = ['intTOPNumOfDays'];
  	protected $primaryKey = 'intTOPID';
  	protected $dates = ['deleted_at'];
  	public $timestamps = false;

  
  	public static $rules = [
        'intTOPNumOfDays' => 'required',
    ];
}
