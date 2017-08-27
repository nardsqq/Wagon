<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'tblProduct';
  protected $fillable = ['intP_ProdCateg_ID', 'strProdName', 'strProdHandle', 'strProdSKU', 'txtProdDesc'];
  protected $primaryKey = 'intProdID';
  public $timestamps = false;

  public function prodcategs() 
  {
    return $this->belongsTo('App\ProductCategory', 'intP_ProdCateg_ID');
  }

  public function attribs() 
  {
    return $this->belongsToMany('App\Attribute', 'tblFeatureSet', 'intFS_Prod_ID', 'intFS_Attrib_ID');
  }

  public static $rules = [
    'strProdName' => 'required|unique_with:tblproduct, intP_ProdCateg_ID, strProdHandle',
    'intP_ProdCateg_ID' => 'required'
  ];
}
