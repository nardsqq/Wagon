<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttribute extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_prod_attrib';
    protected $guarded = [];
    protected $primaryKey = 'int_prod_attrib_id';

    public function attribute()
    {
        return $this->belongsTo('App\Attribute', 'int_pa_attrib_id_fk');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'int_pa_prod_id_fk');
    }
}
