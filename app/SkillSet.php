<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillSet extends Model
{
    use SoftDeletes;
    
    protected $table = 'tblSkillSet';
    protected $fillable = ['intSkillSetRoleID', 'intSkillSetSkillID', 'intSkillSetStatus'];
    protected $primaryKey = 'intSkillSetID';
    public $timestamps = false;

    public function roles()
    {
    	return $this->belongsToMany('App/Role, intSkillSetRoleID');
    }

    public function skills()
    {
    	return $this->hasMany('App/Skill, intSkillSetSkillID');
    }
}
