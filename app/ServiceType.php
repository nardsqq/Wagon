<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceType extends Model
{
	use SoftDeletes;
	
  	protected $table = 'tblServiceType';
  	protected $fillable = ['strServTypeName', 'txtServTypeDesc'];
  	protected $primaryKey = 'intServTypeID';
    protected $dates = ['deleted_at'];
  	public $timestamps = false;

  	public function servareas() 
  	{
  		return $this->hasMany('App\ServiceArea');
  	}

    public static $rules = [
        'strServTypeName' => 'required|min:2|unique:tblServiceType|max:45|regex:/^[a-z ,.\'-]+$/i',
        'txtServTypeDesc' => 'min:2|max:50|regex:/^[a-z ,.\'-]+$/i'
    ];
}
