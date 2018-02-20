<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    protected $table = 'tbl_item_order';
    protected $guarded = [];
    protected $primaryKey = 'int_item_order_id';

    public function order() 
    {
      return $this->belongsTo('App\Order', 'int_io_order_id_fk');
    }

    public function variant() 
    {
      return $this->belongsTo('App\Variant', 'int_io_var_id_fk');
    }
}
