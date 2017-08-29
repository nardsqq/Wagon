<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel extends Model
{
    use SoftDeletes;

	protected $table = 'tblPersonnel';
	protected $fillable = ['intP_ProdCateg_ID', 'strProdName', 'strProdHandle', 'strProdSKU', 'txtProdDesc'];
	protected $primaryKey = 'intProdID';
	public $timestamps = false;
}
