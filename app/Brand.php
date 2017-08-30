<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
	use SoftDeletes;

  	protected $table = 'tblBrand';
  	protected $fillable = ['strBrandName', 'txtBrandDesc'];
  	protected $primaryKey = 'intBrandID';
  	protected $dates = ['deleted_at'];
  	public $timestamps = false;

    public function items()
    {
      return $this->hasMany('App\Item', 'intI_Brand_ID');
    }

  	public static $rules = [
        'strBrandName' => 'required|min:2|unique:tblBrand|max:45|regex:/^[a-z ,.\'-]+$/i',
      	'txtBrandDesc' => 'min:2|max:50|regex:/^[a-z ,.\'-]+$/i'
    ];
}
