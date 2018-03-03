<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_supplier';

    protected $guarded = [];

    protected $primaryKey = 'int_supplier_id';

    public static $rules = [
      'str_supplier_name' => 'required|max:45|unique:tbl_supplier',
      'txt_supplier_address' => 'required',
      'str_supplier_mobile_num' => 'required'
    ];
}
