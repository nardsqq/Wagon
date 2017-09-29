<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends Model
{
	use SoftDeletes;

  	protected $table = 'tblProductType';
  	protected $fillable = ['strProdTypeName', 'txtProdTypeDesc'];
  	protected $primaryKey = 'intProdTypeID';
    protected $dates = ['deleted_at'];
  	public $timestamps = false;

  	public function products() 
  	{
  		return $this->hasMany('App\Product', 'intP_ProdType_ID');
  	}

  	public static $rules = [
        'strProdTypeName' => 'required|min:2|unique:tblProductType|max:45|regex:/^[a-z ,.\'-]+$/i',
      	'txtProdTypeDesc' => 'min:2|max:50|regex:/^[a-z ,.\'-]+$/i'
    ];
}
