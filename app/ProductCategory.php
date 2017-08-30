<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
	use SoftDeletes;

  	protected $table = 'tblProductCategory';
  	protected $fillable = ['strProdCategName', 'txtProdCategDesc'];
  	protected $primaryKey = 'intProdCategID';
    protected $dates = ['deleted_at'];
  	public $timestamps = false;

  	public function products() 
  	{
  		return $this->hasMany('App\Product', 'intP_ProdCateg_ID');
  	}

  	public static $rules = [
        'strProdCategName' => 'required|min:2|unique:tblProductCategory|max:45|regex:/^[a-z ,.\'-]+$/i',
      	'txtProdCategDesc' => 'min:2|max:50|regex:/^[a-z ,.\'-]+$/i'
    ];
}
