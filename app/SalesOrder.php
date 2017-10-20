<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $table = 'tblSalesOrder';
    protected $guarded = [];
    protected $primaryKey = 'intSalesOrderID';
    protected $dates = ['datSODateReceived'];
    public $timestamps = false;

    public function details()
    {
      return $this->hasMany('App\SalesOrderDetail', 'intSODP_SO_ID');
    }

    public function quote(){
        return $this->belongsTo('App\Quotation', 'intSO_QuotH_ID');
    }

}
