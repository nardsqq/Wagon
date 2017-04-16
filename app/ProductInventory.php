<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    protected $table = 'tblproductinventory';
    protected $primaryKey = 'intProductInventoryID'; 
    public $timestamps = false;
}
