<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
	use SoftDeletes;

	protected $table = 'tblAttribute';
	protected $fillable = ['strAttribName'];
	protected $primaryKey = 'intAttribID';
	protected $dates = ['deleted_at'];
	public $timestamps = false;

	public function products()
	{
		return $this->belongsToMany('App\Product', 'tblFeatureSet', 'intFS_Attrib_ID', 'intFS_Prod_ID');
	}

}
