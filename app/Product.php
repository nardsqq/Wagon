<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'tblProduct';
    protected $fillable = ['intP_ProdType_ID', 'strProdName', 'txtProdDesc'];
    protected $primaryKey = 'intProdID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function prodtypes() 
    {
      return $this->belongsTo('App\ProductType', 'intP_ProdType_ID');
    }

    public function variants()
    {
        return $this->hasMany('App\Variant', 'intV_Prod_ID');
    }

    public static $rules = [
      'strProdName' => 'required|max:45|unique:tblproduct',
      'intP_ProdType_ID' => 'required'
    ];
}
