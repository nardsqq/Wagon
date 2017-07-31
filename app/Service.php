<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $table = 'tblservice';
    protected $primaryKey = 'intServiceID';
    public $timestamps = false;

    public static $new_rules = [
    	'strServiceName' => 'required|unique_with:tblservice,strDesc,intServiceCategory',
    	'strDesc' => 'max:25',
    	'intServiceCategory' => 'required'
    ];

    public static $update_rules = [
      'strServiceName' => 'required|unique_with:tblservice,strDesc,intServiceCategory',
      'strDesc' => 'max:25',
      'intServiceCategory' => 'required'
    ];
}
