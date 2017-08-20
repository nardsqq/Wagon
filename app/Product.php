<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'tblProduct';
  protected $fillable = ['strProdName', 'strProdHandle', 'strProdSKU', 'txtProdDesc'];
  protected $primaryKey = 'intProdID';
  public $timestamps = false;

  public function prodcateg() {
	return $this->belongsTo('App\ProductCategory', 'intProdProdCateID');
  }

  public static $rules = [
    'strProdName' => 'required|unique_with:tblproduct,intProdProdCateID,strProdHandle',
    'intProdProdCateID' => 'required'
  ];
}
