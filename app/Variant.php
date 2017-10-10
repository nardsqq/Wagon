<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use SoftDeletes;

    protected $table = 'tblVariant';
    protected $fillable = ['intV_Supp_ID', 'strProdName', 'txtProdDesc'];
    protected $primaryKey = 'intProdID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function products() 
    {
      return $this->belongsTo('App\Product', 'intV_Prod_ID');
    }

    public function supps() 
    {
      return $this->belongsTo('App\Supplier', 'intV_Supp_ID');
    }

    public function brands() 
    {
      return $this->belongsTo('App\Brand', 'intV_Brand_ID');
    }

    public static $rules = [
      'strProdName' => 'required|max:45|unique:tblproduct',
      'intP_ProdType_ID' => 'required'
    ];
}
