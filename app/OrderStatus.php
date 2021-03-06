<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'tbl_order_status';
    protected $guarded = [];
    protected $primaryKey = 'int_order_status_id';

    public function order() 
    {
      return $this->belongsTo('App\Order', 'int_orstat_order_id_fk');
    }

    public static $status = [
      'NEW' =>  'New', 
      'PROC' => 'On process', // kapag pumasok na sa delivery schedule / service schedule
      'DEPL' => 'Deploying/Deployed', // sa delivery schedule or start ng service
      'BILL' => 'Billing', // kapag nagawa na ang invoice
      'PAID' => 'Paid', // kapag nagreceive ng payment 
      'CANC' => 'Cancelled' // kapag di na tuloy (sa order pwede mag-cancel)
  ];

  public function getValueAttribute(){
    switch($this->str_status){
      case OrderStatus::$status['NEW']  : return (object)['class' => 'info', 'icon' => 'fa-circle-o']; break;
      case OrderStatus::$status['PROC'] : return (object)['class' => 'warning', 'icon' => 'fa-circle-o-notch fa-spin']; break;
      case OrderStatus::$status['DEPL'] : return (object)['class' => 'info', 'icon' => 'fa-circle']; break;
      case OrderStatus::$status['BILL'] : return (object)['class' => 'info', 'icon' => 'fa-circle-o']; break;
      case OrderStatus::$status['PAID'] : return (object)['class' => 'success', 'icon' => 'fa-check']; break;
      case OrderStatus::$status['CANC'] : return (object)['class' => 'danger', 'icon' => 'fa-circle-o']; break;
    }
  }
}
