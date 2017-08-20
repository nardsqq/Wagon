<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
  protected $table = 'tblProductCategory';
  protected $fillable = ['strProdCategName', 'txtProdCategDesc'];
  protected $primaryKey = 'intProdCategID';
  public $timestamps = false;

  public function product() {
	return $this->hasMany('App\Product', 'intProdCategID');
  }
}
