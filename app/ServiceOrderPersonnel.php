<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOrderPersonnel extends Model
{
    protected $table = 'tbl_service_personnel';
    protected $guarded = [];
    protected $primaryKey = 'int_serv_pers_id';

    public function schedule() 
    {
      return $this->belongsTo('App\ServiceOrderSchedule', 'int_schedule_id_fk');
    }

    public function personnel() 
    {
      return $this->belongsTo('App\Personnel', 'int_personnel_id_fk');
    }
}
