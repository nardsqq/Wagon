<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceStep extends Model
{
	protected $table = 'tblServiceStep';
	protected $primaryKey = 'intServStepID';
	protected $guarded = [];
	public $timestamps = false;
}
