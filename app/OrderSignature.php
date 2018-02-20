<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderSignature extends Model
{
    protected $table = 'tbl_order_signature';
    protected $guarded = [];
    protected $primaryKey = 'int_order_signature_id';

    public function order() 
    {
      return $this->belongsTo('App\Order', 'int_orsig_order_id_fk');
    }
}
