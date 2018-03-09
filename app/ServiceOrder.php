<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $table = 'tbl_service_order';
    protected $guarded = [];
    protected $appends = ['personnels'];
    protected $primaryKey = 'int_service_order_id';

    public function order() 
    {
        return $this->belongsTo('App\Order', 'int_so_order_id_fk');
    }

    public function service() 
    {
        return $this->belongsTo('App\Service', 'int_so_service_id_fk');
    }

    public function service_materials(){
        return $this->hasMany('App\ServiceOrderMaterial', 'int_sm_service_order_id_fk');
    }

    public function service_schedules(){
        return $this->hasMany('App\ServiceOrderSchedule', 'int_ss_service_order_id_fk');
    }

    public function service_status(){
        return $this->hasMany('App\ServiceOrderStatus', 'int_sos_service_order_id_fk');
    }

    public function getAmountAttribute(){
        return $this->service->dbl_service_price;
    }

    public function getPersonnelsAttribute(){
        return [];
    }
    
}
