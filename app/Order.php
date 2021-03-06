<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static $prefix = 'O';
    public static $suffix = ['PDT', 'SVC'];

    public static $terms = [
        ['id' => 0, 'desc' => 'Upon Receipt'],
        ['id' => 1, 'desc' => 'EOM (End of the Month)'],
        ['id' => 2, 'desc' => 'Net 15'],
        ['id' => 3, 'desc' => 'Net 30'],
        ['id' => 4, 'desc' => 'Net 60']
    ];
    
    public static $modes = [
        ['id' => 0, 'desc' => 'COD (Cash On Delivery)'],
        ['id' => 1, 'desc' => 'Cheque']
    ];
        
    public static $downpayments = [
        ['id' => 0, 'desc' => 30],
        ['id' => 1, 'desc' => 50]
    ];
        
    public static $discounts = [
        ['id' => 0, 'desc' => 5],
        ['id' => 1, 'desc' => 10],
        ['id' => 2, 'desc' => 15]
    ];

    protected $table = 'tbl_order';
    protected $guarded = [];
    protected $primaryKey = 'int_order_id';
    protected $dates = ['dat_order_date'];

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
        return $this->hasMany('App\OrderStatus', 'int_orstat_order_id_fk');
    }

    public function invoice(){
        return $this->hasOne('App\Invoice', 'int_invoice_order_id_fk');
    }

    public function delivery() 
    {
      return $this->hasOne('App\Delivery', 'int_del_order_id_fk');
    }

    public function getCurrentStatusAttribute(){
        return $this->status()->orderBy('int_order_status_id', 'desc')->first();
    }

    public function getTypeAttribute(){
        return $this->item_orders->count() > 0 ? 'Item Order' : 'Service Order';
    }

    public function getCanCancelAttribute(){
        return count($this->invoice->payments) == 0 && $this->current_status->str_status != OrderStatus::$status['CANC'] && $this->current_status->str_status != OrderStatus::$status['PAID']
        ;
    }
}


