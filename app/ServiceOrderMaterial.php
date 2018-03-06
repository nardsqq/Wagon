<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOrderMaterial extends Model
{
    protected $table = 'tbl_service_materials';
    protected $guarded = [];
    protected $primaryKey = 'int_serv_mat_id';

    public function service_order() 
    {
      return $this->belongsTo('App\ServiceOrder', 'int_sm_service_order_id_fk');
    }

    public function material(){
        return $this->belongsTo('App\Material', 'int_sm_material_id_fk');
    }

    public function variant(){
        return $this->belongsTo('App\Variant', 'int_sm_var_id_fk');
    }

    public function getAmountAttribute(){
        return $this->variant->price * $this->int_quantity;
    }
    public static $acqui_types = ['Buy', 'Free', 'Remove'];
    public function getAcquiTypeAttribute(){
        return static::$acqui_types[$this->int_acqui_type];
    }
}
