<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = [
      'intServiceCategID',
      'strServiceCategName',
      'txtServiceCategDesc',
    ];

    protected $table = 'tblservicecategory';
    protected $primaryKey = 'intServiceCategID'; 
    public $timestamps = false;

    public static $new_rules = [
    	'strServiceCategName' => 'required|unique:tblservicecategory|max:45',
    	'strDesc' => 'max:25'
    ];

    public static $update_rules = [
      'strServiceCategName' => 'required|unique:tblservicecategory|max:45',
      'strDesc' => 'max:25'
    ];
}
