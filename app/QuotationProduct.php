<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotationProduct extends Model
{
    use SoftDeletes;

    protected $table = 'tblQuotationDetailsProduct';
    protected $guarded = [];
    protected $primaryKey = 'intQuotDPID';
    public $timestamps = false;

    public static $rules = [];

    public function quotation(){
        return $this->belongsTo('App\Quotation', 'intQDP_QuotH_ID');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'intQDP_Prod_ID');
    }
}