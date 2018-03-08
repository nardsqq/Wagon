<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'tbl_delivery';
    protected $guarded = [];
    protected $primaryKey = 'int_delivery_id';

    public function order() 
    {
        return $this->belongsTo('App\Order', 'int_del_order_id_fk');
    }

    public function personnel() 
    {
        return $this->belongsTo('App\Personnel', 'int_del_personnel_id_fk');
    }

    public function status() 
    {
        return $this->hasMany('App\DeliveryStatus', 'int_delstat_delivery_id_fk');
    }

    public function getCurrentStatusAttribute(){
        return $this->status()->orderBy('int_delivery_status_id', 'desc')->first();
    }
}
