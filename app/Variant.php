<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use SoftDeletes;

    protected $table = 'tblVariant';
    protected $fillable = ['intV_Supp_ID', 'intV_Brand_ID', 'intV_Prod_ID', 'strVarModel', 'strVarHandle', 'intVarReStockLevel', 'txtVarDesc'];
    protected $primaryKey = 'intVarID';
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
      'strVarModel' => 'required|max:45|unique:tblVariant',
      'intVarReStockLevel' => 'required'
    ];
}
