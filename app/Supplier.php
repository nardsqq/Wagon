<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $table = 'tblSupplier';

    protected $fillable = 
    [
        'strSuppName', 
        'strSuppAddLotNo', 
        'strSuppAddStBldg', 
        'strSuppAddBrgy',
        'strSuppAddCity',
        'strSuppContactNum',
        'strSuppContactPers',
        'strSuppContactPersNum'
    ];

    protected $primaryKey = 'intSuppID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function variants()
    {
      return $this->hasMany('App\Variant', 'intV_Supp_ID');
    }

    public static $rules = [
      'strSuppName' => 'required|max:45|unique:tblSupplier',
      'strSuppContactNum' => 'required',
      'strSuppContactPers' => 'required',
    ];
}
