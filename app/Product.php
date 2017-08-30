<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'tblProduct';
    protected $fillable = ['intP_ProdCateg_ID', 'strProdName', 'txtProdDesc'];
    protected $primaryKey = 'intProdID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function prodcategs() 
    {
      return $this->belongsTo('App\ProductCategory', 'intP_ProdCateg_ID');
    }

    public function attribs() 
    {
      return $this->belongsToMany('App\Attribute', 'tblFeatureSet', 'intFS_Prod_ID', 'intFS_Attrib_ID');
    }

    public function items()
    {
        return $this->hasMany('App\Item', 'intI_Prod_ID');
    }

    public static $rules = [
      'strProdName' => 'required|unique_with:tblproduct, intP_ProdCateg_ID, strProdHandle',
      'intP_ProdCateg_ID' => 'required'
    ];
}
