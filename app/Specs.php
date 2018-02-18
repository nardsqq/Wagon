<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specs extends Model
{
    use SoftDeletes;

  	protected $table = 'tbl_specs';
  	protected $primaryKey = 'int_specs_id';
    protected $guarded = [];

    public function variations()
    {
        return $this->belongsTo('App\Variant', 'int_spec_var_id_fk');
    }

    public function prod_attrib()
    {
        return $this->belongsTo('App\ProductAttribute', 'int_spec_pa_id_fk');
    }

  	public static $rules = [
        'str_specs_name' => 'required|min:2|unique:tbl_specs|max:45|regex:/^[a-z ,.\'-]+$/i'
    ];
}
