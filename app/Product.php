<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'tblProduct';
    protected $fillable = ['intP_ProdType_ID', 'strProdName', 'txtProdDesc', 'intProdCateg'];
    protected $primaryKey = 'intProdID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function prodtypes() 
    {
      return $this->belongsTo('App\ProductType', 'intP_ProdType_ID');
    }

    public function items()
    {
        return $this->hasMany('App\Item', 'intI_Prod_ID');
    }

    public static $rules = [
      'strProdName' => 'required|unique_with:tblproduct, intP_ProdType_ID',
      'intP_ProdType_ID' => 'required'
    ];
}
