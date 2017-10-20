<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiveHeader extends Model
{
    protected $table = 'tblReceiveDelHeader';
    protected $guarded = [];
    protected $dates = ['intRecDelDtmRec'];
    protected $primaryKey = 'intRecDelID';
    public $timestamps = false;

    public static $rules = [];
    
    public function details()
    {
      return $this->hasMany('App\ReceiveDetail', 'intRDD_Head_ID');
    }

    public function supplier(){
      return $this->belongsTo('App\Supplier', 'intRD_Supp_ID');
    }

    public function getTotalAttribute(){
      return $this->details()->sum('intRecDelDetQty');
    }
}
