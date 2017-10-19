<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use SoftDeletes;

    protected $table = 'tblVariant';
    protected $fillable = ['intV_Supp_ID', 'intV_Brand_ID', 'intV_Prod_ID', 'strVarPartNum','strVarModel', 'strVarHandle', 'intVarReStockLevel', 'txtVarDesc'];
    protected $primaryKey = 'intVarID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function products() 
    {
      return $this->belongsTo('App\Product', 'intV_Prod_ID');
    }

    public function brands() 
    {
      return $this->belongsTo('App\Brand', 'intV_Brand_ID');
    }

    public function dimensions(){
      return $this->belongsToMany('App\Dimension','tblDimensionSet',  'intDS_Var_ID', 'intDS_Dim_ID', 'intVarID');
    }

    public static $rules = [
      'strVarModel' => 'required|max:45',
      'intVarReStockLevel' => 'required'
    ];
}
