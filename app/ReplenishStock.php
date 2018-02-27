<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplenishStock extends Model
{
    protected $table = 'tbl_replenish';
    protected $guarded = [];
    protected $primaryKey = 'int_replenish_id';

    public function supplier() 
    {
      return $this->belongsTo('App\Supplier', 'int_supplier_id_fk');
    }
}
