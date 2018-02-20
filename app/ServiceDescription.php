<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceDescription extends Model
{
    protected $table = 'tbl_service_desc';
    protected $guarded = [];
    protected $primaryKey = 'int_service_desc_id';

    public function materials() 
    {
      return $this->hasMany('App\Material', 'int_mat_service_id_fk');
    }

    public function descriptions() 
    {
      return $this->hasMany('App\ServiceDescription', 'int_sd_service_id_fk');
    }
}
