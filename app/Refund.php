<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    //
    protected $table = 'tbl_refund';
    protected $primaryKey = 'int_refund_id';

    public function invoice(){
        return $this->belongsTo('App\Invoice', 'int_refund_invoice_id_fk');
    }

    public function items()
    {
        return $this->hasMany('App\RefundItem', 'int_ref_item_refund_id_fk');
    }

    public function status()
    {
        return $this->hasMany('App\RefundStatus', 'int_rstat_refund_id_fk');
    }
}
