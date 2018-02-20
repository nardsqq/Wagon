<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderFooter extends Model
{
    protected $table = 'tbl_order_footer';
    protected $guarded = [];
    protected $primaryKey = 'int_order_footer_id';

    public function order() 
    {
      return $this->belongsTo('App\Order', 'int_of_order_id_fk');
    }
}
