<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
  protected $table = 'tblSkill';
  protected $fillable = ['strSkillName', 'txtSkillDesc'];
  protected $primaryKey = 'intSkillID';
  public $timestamps = false;

  public static $rules = [
    'strSkillName' => 'required|min:2|unique:tblSkill|max:45|regex:/^[a-z ,.\'-]+$/i',
	'txtSkillDesc' => 'min:2|max:500|regex:/^[a-z ,.\'-]+$/i'
  ];
}
