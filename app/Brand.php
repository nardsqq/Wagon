<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

  	protected $table = 'tbl_brand';
  	protected $primaryKey = 'int_brand_id';
    protected $guarded = [];

    // public function items()
    // {
    //     return $this->hasMany('App\Item', 'int_brand_id');
    // }

  	public static $rules = [
        'str_brand_name' => 'required|min:2|unique:tbl_brand|max:45|regex:/^[a-z ,.\'-]+$/i'
    ];
}
