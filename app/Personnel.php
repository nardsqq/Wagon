<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    //
    protected $table = 'tblpersonnel';
    protected $primaryKey = 'intPersID'; 
    public $timestamps = false;

    public static $new_rules = [
    	'strPersFName' => 'required|unique_with:tblpersonnel,strPersMName,strPersLName|max:45',
    	'strPersMName' => 'max:45',
    	'strPersLName' => 'required|max:45',
    	'intPersDeptID' => 'required',
    	'intPersPosID' => 'required',
    	'strPersAddress' => 'required|max:45',
    	'strPersContactNumber' => 'required|unique:tblpersonnel|max:11'
    ];

    public static $update_rules = [
        'strPersFName' => 'required|unique_with:tblpersonnel,strPersMName,strPersLName,ignore:id=intPersID|max:45',
    	'strPersMName' => 'max:45',
    	'strPersLName' => 'required|max:45',
    	'intPersDeptID' => 'required',
    	'intPersPosID' => 'required',
    	'strPersAddress' => 'required|max:45',
    	'strPersContactNumber' => 'required|unique:tblpersonnel|max:11'
    ];
}
