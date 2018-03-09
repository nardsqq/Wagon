<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_variation';
    protected $guarded = [];
    protected $primaryKey = 'int_var_id';
    protected $appends = ['price', 'stock', 'quantity'];

    public function product() 
    {
      return $this->belongsTo('App\Product', 'int_prod_id_fk');
    }

    public function specs(){
      return $this->hasMany('App\Specs', 'int_spec_var_id_fk');
    }

    public function stocks(){
      return $this->hasMany('App\Stock', 'int_stock_var_id_fk');
    }

    public function prices(){
      return $this->hasMany('App\Price', 'int_ip_var_id_fk');
    }

    public static $rules = [
      'int_prod_id_fk' => 'required'
    ];

    // for process order - vue
    public function getQuantityAttribute(){
      return 1;
    }

    public function getPriceAttribute(){
      return $this->prices()->latest()->first()->dbl_price;
    }

    public function getStockAttribute(){
      return $this->stocks()->sum('int_quantity');
    }

    public function getCurrPrevStock($date = null){
      $date = $date ?: date('c');
      $stock = $this->stocks()->where('int_stock_var_id_fk', $this->int_var_id)->where('created_at', '<=', $date)->latest()->pluck('int_quantity')->take(2);
      
      return count($stock) == 0 ? ['current'=>0, 'previous'=>0] : [
        'current' => $stock[0],
        'previous' => count($stock) == 2 ? $stock[1] : 0
      ];
    }

    // public function getCurrentStockAttribute(){
    //   return 
    //     (\DB::table('tblRecDelDetails')->selectRaw("SUM(intRecDelDetQty) as stock")->where('intRDD_Var_ID', $this->intVarID)->groupBy('intrdd_var_id')->pluck('stock')->first() ?: 0) - (\DB::table('tblSODetailsProduct')->selectRaw("SUM(intQuotDPQuantity) as stock")->where('intSODP_Var_ID', $this->intVarID)->groupBy('intSODP_Var_ID')->pluck('stock')->first() ?: 0);
    // }
}