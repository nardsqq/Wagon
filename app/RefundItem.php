<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefundItem extends Model
{
    //
    protected $table = 'tbl_refund_item';
    protected $primaryKey = 'int_refund_item_id';


    public function item()
    {
        return $this->belongsTo('App\ItemOrder', 'int_ref_item_item_order_id_fk');
    }
}
