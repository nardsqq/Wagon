<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'tblPersonnel';
    protected $fillable = ['intPers_SkillSet_ID', 'strPersFName', 'strPersMName', 'strPersLName'];
    protected $primaryKey = 'intPersID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;
}
