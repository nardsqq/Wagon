<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
	use SoftDeletes;

	protected $table = 'tbl_attrib';
	protected $guarded = [];
	protected $primaryKey = 'int_attrib_id';

	public function products()
	{
		return $this->belongsToMany('App\Product', 'tblFeatureSet', 'intFS_Attrib_ID', 'intFS_Prod_ID');
	}

	public static $rules = [
        'str_attrib_name' => 'required|min:2|unique:tbl_attrib|max:45|regex:/^[a-z ,.\'-]+$/i',
    ];
}
