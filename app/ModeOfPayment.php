<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModeOfPayment extends Model
{
	use SoftDeletes;

    protected $table = 'tbl_mode_payment';
    protected $guarded = [];
	protected $primaryKey = 'int_mode_pay_id';
	
    public static $rules = [];
}
