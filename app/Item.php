<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $table = 'tblItem';
    protected $fillable = ['intI_Prod_ID', 'intI_Brand_ID', 'strItemModel', 'strItemHandle', 'intItemLevel', 'txtItemDesc'];
    protected $primaryKey = 'intItemID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function products()
    {
    	return $this->belongsTo('App\Product', 'intI_Prod_ID');
    }

    public function brands()
    {
    	return $this->belongsTo('App\Brand', 'intI_Brand_ID');
    }
}
