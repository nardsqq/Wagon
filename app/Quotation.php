<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use SoftDeletes;

    protected $table = 'tblQuotationHeader';
    protected $guarded = [];
    protected $primaryKey = 'intQuotHeadID';
    public $timestamps = false;

    public static $rules = [
        'intQH_Client_ID' => 'required',
        'strQuotHeadLocation' => 'required|max:45',
        'intQH_Pers_ID' => 'required',
        'dtmQuotHeadDateTime' => 'required'
    ];

    public function services()
    {
      return $this->hasMany('App\QuotationService', 'intQDS_QuotH_ID');
    }

    public function products()
    {
      return $this->hasMany('App\QuotationProduct', 'intQDP_QuotH_ID');
    }

    public function client(){
        return $this->belongsTo('App\Client', 'intQH_Client_ID');
    }

    public function agent(){
        return $this->belongsTo('App\Personnel', 'intQH_Pers_ID');
    }

    public function getTypeAttribute(){
        $types = ['Product', 'Service', 'Product & Service'];
        $index = 0;
        if($this->services->count() > 0 && $this->products->count() <= 0){
            $index = 1;
        } else if($this->services->count() <= 0 && $this->products->count() > 0){
            $index = 0;
        } else {
            $index = 2;
        }
        return $types[$index];
    }
}