<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $table = 'tbldepartment';
    protected $primaryKey = 'intDepartmentID'; 
    public $timestamps = false;

    public static $new_rules = [
    	'strDepartmentName' => 'required|unique:tbldepartment|max:45',
    	'strDesc' => 'max:25'
    ];

    public static $update_rules = [
        'strDepartmentName' => 'required|unique_with:tbldepartment,strDesc,ignore:id = intDepartmentID|max:45',
        'strDesc' => 'max:25'
    ];
}
