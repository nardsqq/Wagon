<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
	use SoftDeletes;

	protected $table = 'tbl_discount';
	protected $guarded = [];
	protected $primaryKey = 'int_discount_id';

	public static $rules = [
		'str_discount_name' => 'required|min:2|unique:tbl_discount|max:45|regex:/^[a-z ,.\'-]+$/i',
		'int_discount_percentage' => 'required'
	];
}