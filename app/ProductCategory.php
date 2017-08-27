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
  	public $timestamps = false;

  	public function prod() 
  	{
  		return $this->hasMany('App\Product');
  	}
}
