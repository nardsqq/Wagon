<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdjustStock extends Model
{
    protected $table = 'tbl_stock_adjust';
    protected $guarded = [];
    protected $primaryKey = 'int_stock_adjust_id';

    public function variant() 
    {
      return $this->belongsTo('App\Variant', 'int_sa_var_id_fk');
    }

    public static $actions = [
      'DEP' =>  'Deposit',
      'WIT' => 'Withdraw',
      //'OFF' => 'Offset'
    ];
}
