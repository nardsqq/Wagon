<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'tbl_material';
    protected $guarded = [];
    protected $primaryKey = 'int_material_id';
    protected $appends = ['acqui_type', 'quantity', 'variant'];

    public static $acqui_types = [
        'Buy', 'Free', 'Remove'
    ];

    /// For Vue Purposes
    public function getAcquiTypeAttribute(){
        return 0;
    }

    public function getQuantityAttribute(){
        return 1;
    }

    // empty object
    public function getVariantAttribute(){
        return new \stdClass();
    }

    public function service() 
    {
      return $this->belongsTo('App\Service', 'int_mat_service_id_fk');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'int_mat_prod_id_fk');
    }
}
