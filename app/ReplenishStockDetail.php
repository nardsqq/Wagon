<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplenishStockDetail extends Model
{
    protected $table = 'tbl_repl_detail';
    protected $guarded = [];
    protected $primaryKey = 'int_repl_item_id';

    public function variant() 
    {
      return $this->belongsTo('App\Variant', 'int_repl_var_id_fk');
    }
    
    public function replenish() 
    {
      return $this->belongsTo('App\ReplenishStock', 'int_replenish_id_fk');
    }
}
