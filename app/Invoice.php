<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'tbl_invoice';
    protected $guarded = [];
    protected $primaryKey = 'int_invoice_id';

    public function order() 
    {
      return $this->belongsTo('App\Order', 'int_invoice_order_id_fk');
    }
}
