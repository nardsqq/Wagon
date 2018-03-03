<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'tbl_material';
    protected $guarded = [];
    protected $primaryKey = 'int_material_id';

    public function service() 
    {
      return $this->belongsTo('App\Service', 'int_mat_service_id_fk');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'int_mat_prod_id_fk');
    }
}
