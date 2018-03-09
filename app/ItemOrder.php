<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    protected $table = 'tbl_item_order';
    protected $guarded = [];
    protected $primaryKey = 'int_item_order_id';
    protected $appends = ['price'];

    public function order() 
    {
      return $this->belongsTo('App\Order', 'int_io_order_id_fk');
    }

    public function variant() 
    {
      return $this->belongsTo('App\Variant', 'int_io_var_id_fk');
    }

    public function refund_items(){
      return $this->hasMany('App\RefundItem', 'int_ref_item_item_order_id_fk');
    }

    public function getPriceAttribute(){
      return $this->variant->prices()->where('created_at', '<=', $this->created_at)->latest()->pluck('dbl_price')->first();
    }

    public function getAmountAttribute(){
      return $this->price * $this->int_quantity;
    }
}
