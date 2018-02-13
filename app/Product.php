<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_product';
    protected $guarded = [];
    protected $primaryKey = 'int_product_id';

    // public function items()
    // {
    //     return $this->hasMany('App\Item', 'int_product_id');
    // }

    public static $rules = [
      'str_product_name' => 'required|max:45|unique:tbl_product'
    ];
}
