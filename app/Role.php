<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    protected $table = 'tblRole';
    protected $fillable = ['strRoleName', 'txtRoleDesc'];
    protected $primaryKey = 'intRoleID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function skills() 
    {
      return $this->belongsToMany('App\Skill', 'tblSkillSet', 'intSS_Role_ID', 'intSS_Skill_ID');
    }

    public static $rules = [
        'strRoleName' => 'required|min:2|unique:tblRole|max:45|regex:/^[a-z ,.\'-]+$/i',
      	'txtRoleDesc' => 'min:2|max:50|regex:/^[a-z ,.\'-]+$/i'
    ];
}
