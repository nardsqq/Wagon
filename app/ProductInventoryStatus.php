<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInventoryStatus extends Model
{
    protected $table = 'tblProdInventoryStatus';
    protected $primaryKey = 'intProdInventoryStatusID'; 
    public $timestamps = false;

    public static $new_rules = [
    	'strProdInventoryStatusName' => 'required|unique:tblProdInventoryStatus|max:45',
        'strDesc' => 'max:25'
    ];

    public static $update_rules = [
        'strProdInventoryStatusName' => 'required|unique:tblProdInventoryStatus|max:45',
        'strDesc' => 'max:25'
    ];
}
