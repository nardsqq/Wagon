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
}
