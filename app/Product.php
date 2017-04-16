<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'tblproduct';
    protected $primaryKey = 'intProductID'; 
    public $timestamps = false;

    public static $new_rules = [
    	'strProductName' => 'required|unique_with:tblproduct,intProductCategory,strProductSerialNumber|max:45',
    	'intProductCategory' => 'required',
    	'strProductSerialNumber' => 'required'
    ];
    
    public static $update_rules = [
    	'strProductName' => 'required|unique_with:tblproduct,intProductCategory,strProductSerialNumber|max:45',
    	'intProductCategory' => 'required',
    	'strProductSerialNumber' => 'required'
    ];
}
