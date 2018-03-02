<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceDescription extends Model
{
    protected $table = 'tbl_service_desc';
    protected $guarded = [];
    protected $primaryKey = 'int_service_desc_id';

    public function service() 
    {
      return $this->belongsTo('App\Service', 'int_sd_service_id_fk');
    }
}
