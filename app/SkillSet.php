<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillSet extends Model
{
  protected $table = 'tblSkillSet';
  protected $fillable = ['intSkillSetRoleID', 'intSkillSetSkillID', 'intSkillSetStatus'];
  protected $primaryKey = 'intSkillSetID';
  public $timestamps = false;

  public function role()
  {
  	return $this->belongsToMany('App/Role, intSkillSetRoleID');
  }

  public function skills()
  {
  	return $this->hasMany('App/Skill, intSkillSetSkillID');
  }
}
