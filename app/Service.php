<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_service';
    protected $guarded = [];
    protected $primaryKey = 'int_service_id';

    public function materials() 
    {
      return $this->hasMany('App\Material', 'int_mat_service_id_fk');
    }

    public function descriptions() 
    {
      return $this->hasMany('App\ServiceDescription', 'int_sd_service_id_fk');
    }
}
