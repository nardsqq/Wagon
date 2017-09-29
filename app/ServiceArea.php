<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceArea extends Model
{
    use SoftDeletes;

	protected $table = 'tblServiceArea';
	protected $fillable = ['intSA_ServType_ID', 'strServAreaName', 'txtServAreaDesc'];
	protected $primaryKey = 'intServAreaID';
	protected $dates = ['deleted_at'];
	public $timestamps = false;

	public function servtypes() 
	{
    	return $this->belongsTo('App\ServiceType', 'intSA_ServType_ID');
	}
}
