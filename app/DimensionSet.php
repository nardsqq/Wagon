<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DimensionSet extends Model
{
    protected $table = 'tblDimensionSet';
	protected $primaryKey = 'intDimSetID';
	protected $guarded = [];
	public $timestamps = false;

	public function dimen(){
		return $this->hasOne('App\Dimension', 'intDimenID', 'intDS_Dim_ID');
	}

	public function variant(){
		return $this->hasOne('App\Variant', 'intVarID', 'intDS_Var_ID');
	}
}
