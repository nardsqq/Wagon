<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'tbl_invoice';
    protected $guarded = [];
    protected $primaryKey = 'int_invoice_id';

    public static $prefix = 'I';
    public static $suffix = ['PDT', 'SVC'];

    public function order() 
    {
      return $this->belongsTo('App\Order', 'int_invoice_order_id_fk');
    }

    public function payments() 
    {
      return $this->hasMany('App\Payment', 'int_paym_invoice_id_fk');
    }
}
