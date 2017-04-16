<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $fillable = [
      'intProductCategoryID',
      'strProductCategoryName',
    ];

    protected $table = 'tblproductcategory';
    protected $primaryKey = 'intProductCategoryID'; 
    public $timestamps = false;

    public static $new_rules = [
    	'strProductCategoryName' => 'required|unique:tblproductcategory|max:45',
        'strDesc' => 'max:25'
    ];

    public static $update_rules = [
        'strProductCategoryName' => 'required|unique:tblproductcategory|max:45',
        'strDesc' => 'max:25'
    ];

}
