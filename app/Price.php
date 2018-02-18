<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'tbl_item_price';
    protected $guarded = [];
    protected $primaryKey = 'int_item_price_id';

    public function variant() 
    {
      return $this->belongsTo('App\Variant', 'int_ip_var_id_fk');
    }

}
