<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'tbl_order_status';
    protected $guarded = [];
    protected $primaryKey = 'int_order_status_id';

    public function order() 
    {
      return $this->belongsTo('App\Order', 'int_orstat_order_id_fk');
    }
}
