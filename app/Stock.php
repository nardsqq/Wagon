<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'tbl_stock';
    protected $guarded = [];
    protected $primaryKey = 'int_stock_id';

    public function variant() 
    {
      return $this->belongsTo('App\Variant', 'int_stock_var_id_fk');
    }
}
