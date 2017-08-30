<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;
    
    protected $table = 'tblSkill';
    protected $fillable = ['strSkillName', 'txtSkillDesc'];
    protected $primaryKey = 'intSkillID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function skillsets()
    {
       return $this->belongsToMany('App/SkillSet, intSkillSetSkillID');
    }

    public static $rules = [
        'strSkillName' => 'required|min:2|unique:tblSkill|max:45|regex:/^[a-z ,.\'-]+$/i',
        'txtSkillDesc' => 'min:2|max:50|regex:/^[a-z ,.\'-]+$/i'
    ];
}
