<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Downpayment extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_downpayment';
    protected $guarded = [];
    protected $primaryKey = 'int_down_id';

    public static $rules = [];
}
