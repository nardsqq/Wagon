<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiveDetail extends Model
{
    protected $table = 'tblRecDelDetails';
    protected $guarded = [];
    protected $primaryKey = 'intRecDelDetID';
    public $timestamps = false;

    public static $rules = [];

    public function header(){
        return $this->belongsTo('App\ReceiveHeader', 'intRDD_Head_ID');
    }

    public function variant(){
        return $this->belongsTo('App\Variant', 'intRDD_Var_ID');
    }
}
