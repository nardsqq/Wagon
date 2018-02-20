<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOrderStatus extends Model
{
    protected $table = 'tbl_serv_order_status';
    protected $guarded = [];
    protected $primaryKey = 'int_serv_order_status';

    public function service_order() 
    {
      return $this->belongsTo('App\ServiceOrder', 'int_sos_service_order_id_fk');
    }
}
