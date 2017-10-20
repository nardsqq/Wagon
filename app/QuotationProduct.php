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

    public function variant(){
        return $this->belongsTo('App\Variant', 'intQDP_Var_ID');
    }
}