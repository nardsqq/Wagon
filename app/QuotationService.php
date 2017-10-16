<?php

namespace App;

use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\SoftDeletes;


class QuotationService extends Model
{
    use SoftDeletes;

    protected $table = 'tblQuotationDetailsService';
    protected $guarded = [];
    protected $primaryKey = 'intQuotDSID';
    public $timestamps = false;

    public static $rules = [];

    public function quotation(){
        return $this->belongsTo('App\Quotation', 'intQDS_QuotH_ID');
    }

    public function service_area(){
        return $this->belongsTo('App\ServiceArea', 'intQDS_ServArea_ID');
    }
}
