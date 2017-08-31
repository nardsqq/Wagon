<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BasePrice extends Model
{
	use SoftDeletes;

	protected $table = 'tblPrice';
	protected $fillable = ['intP_Item_ID', 'decPriceAmount'];
	protected $primaryKey = 'intBasePriceID';
	public $timestamps = false;

	public function items() 
	{
	  return $this->belongsTo('App\Item', 'intP_Item_ID');
	}
}
