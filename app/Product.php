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

    public function prod_attribs()
    {
        return $this->hasMany('App\ProductAttribute', 'int_pa_prod_id_fk');
    }

    public function variants()
    {
        return $this->hasMany('App\Variant', 'int_prod_id_fk');
    }

    public static $rules = [
      'str_product_name' => 'required|max:45|unique:tbl_product'
    ];

}
