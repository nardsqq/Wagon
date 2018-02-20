<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOrderSchedule extends Model
{
    protected $table = 'tbl_service_sched';
    protected $guarded = [];
    protected $primaryKey = 'int_sched_id';

    public function service_order() 
    {
      return $this->belongsTo('App\ServiceOrder', 'int_ss_service_order_id_fk');
    }

    public function service_personnel(){
        return $this->hasMany('App\ServiceOrderPersonnel', 'int_schedule_id_fk');
    }
}
