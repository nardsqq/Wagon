<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'tbl_payment';
    protected $guarded = [];
    protected $primaryKey = 'int_payment_id';
    protected $dates = ['dat_date_received'];

    public function invoice() 
    {
      return $this->belongsTo('App\Invoice', 'int_paym_invoice_id_fk');
    }
}