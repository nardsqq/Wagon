<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceChecklist extends Model
{
	protected $table = 'tblServiceChecklist';
	protected $primaryKey = 'intServCLID';
	protected $guarded = [];
	public $timestamps = false;

	public function step(){
		return $this->hasOne('App\ServiceStep', 'intServStepID', 'intSCL_ServStep_ID');
	}

	public function area(){
		return $this->hasOne('App\ServiceStep', 'intServAreaID', 'intSCL_ServArea_ID');
	}
}
