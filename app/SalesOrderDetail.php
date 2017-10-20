<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOrderDetail extends Model
{
    protected $table = 'tblSODetailsProduct';
    protected $guarded = [];
    protected $primaryKey = 'intSODPID';
    public $timestamps = false;

    public function variant(){
        return $this->belongsTo('App\Variant', 'intSODP_Var_ID');
    }

    public function header(){
        return $this->belongsTo('App\SalesOrder', 'intSODP_SO_ID');
    }
}
