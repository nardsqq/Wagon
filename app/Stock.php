<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
	use SoftDeletes;

	protected $table = 'tblStock';
	protected $primaryKey = 'intStockID';
	protected $dates = ['deleted_at'];
	public $timestamps = false;

	public function variants() 
    {
      return $this->belongsTo('App\Variant', 'intS_Var_ID');
    }

    public function suppliers() 
    {
      return $this->belongsTo('App\Supplier', 'intS_Supp_ID');
    }
}
