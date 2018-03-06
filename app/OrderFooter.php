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

    public function term() 
    {
      return $this->belongsTo('App\PaymentTerm', 'int_of_terms_pay_id_fk');
    }
    public function discount() 
    {
      return $this->belongsTo('App\Discount', 'int_of_discount_id_fk');
    }
    public function downpayment() 
    {
      return $this->belongsTo('App\Downpayment', 'int_of_downpayment_id_fk');
    }
    public function mode() 
    {
      return $this->belongsTo('App\ModeOfPayment', 'int_of_mode_pay_id_fk');
    }
}
