<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTerm extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_terms_payment';
    protected $guarded = [];
    protected $primaryKey = 'int_terms_pay_id';
    protected $appends = ['term'];

    public static $rules = [];

    public function getTermAttribute(){
        return $this->int_terms_pay_days.' days - '.$this->int_terms_pay_percentage.'%';
    }
}
