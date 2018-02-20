<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_order';
    protected $guarded = [];
    protected $primaryKey = 'int_order_id';

    public function item_orders(){
        return $this->hasMany('App\ItemOrder', 'int_io_order_id_fk');
    }

    public function service_orders(){
        return $this->hasMany('App\ServiceOrder', 'int_so_order_id_fk');
    }

    public function client() 
    {
      return $this->belongsTo('App\Client', 'int_order_client_id_fk');
    }

    public function footer(){
        return $this->hasOne('App\OrderFooter', 'int_of_order_id_fk');
    }

    public function signatures(){
        return $this->hasMany('App\OrderSignature', 'int_orsig_order_id_fk');
    }

    public function status(){
        return $this->hasMany('App\OrderSignature', 'int_orsig_order_id_fk');
    }

    public function invoice(){
        return $this->hasMany('App\Invoice', 'int_invoice_order_id_fk');
    }
}


