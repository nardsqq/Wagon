<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'tblRole';
  protected $fillable = ['strRoleName', 'txtRoleDesc'];
  protected $primaryKey = 'intRoleID';
  public $timestamps = false;

  public function skillset()
  {
  	return $this->hasMany('App/SkillSet, intSkillSetRoleID');
  }

  public static $rules = [
    'strRoleName' => 'required|min:2|unique:tblRole|max:45|regex:/^[a-z ,.\'-]+$/i',
	'txtRoleDesc' => 'min:2|max:500|regex:/^[a-z ,.\'-]+$/i'
  ];
}
