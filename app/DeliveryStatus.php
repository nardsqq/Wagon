<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
    protected $table = 'tbl_delivery_status';
    protected $guarded = [];
    protected $primaryKey = 'int_delivery_status_id';

    public function delivery() 
    {
        return $this->belongsTo('App\Delivery', 'int_delstat_delivery_id_fk');
    }

    public static $status = [
        'NEW' =>  'New', 
        'CONF' => 'On delivery', // kapag naconfirm na
        'DELI' => 'Delivered', // kapag nilagyan n akung sino yung nagreceive
        'CANC' => 'Cancelled' // kapag nacancel yung order
    ];
  
    public function getValueAttribute(){
      switch($this->str_status){
        case OrderStatus::$status['NEW']  : return (object)['class' => 'info', 'icon' => 'fa-circle-o']; break;
        case OrderStatus::$status['CONF'] : return (object)['class' => 'warning', 'icon' => 'fa-circle-o-notch fa-spin']; break;
        case OrderStatus::$status['DELI'] : return (object)['class' => 'success', 'icon' => 'fa-check']; break;
        case OrderStatus::$status['CANC'] : return (object)['class' => 'danger', 'icon' => 'fa-circle-o']; break;
      }
    }

}
