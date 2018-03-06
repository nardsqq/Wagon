<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceStatus extends Model
{
    protected $table = 'tbl_invoice_status';
    protected $guarded = [];
    protected $primaryKey = 'int_invoice_status_id';

    public function invoice() 
    {
      return $this->belongsTo('App\Order', 'int_instat_invoice_id_fk');
    }

    public static $status = [
      'NEW' =>  'New', 
      'SENT' => 'Sent', // kapag pinalitan kung sino nagreceive
      'PAID' => 'Paid', // upon payment (complete)
  ];

  public function getValueAttribute(){
    switch($this->str_status){
      case static::$status['NEW']  : return (object)['class' => 'info', 'icon' => 'fa-circle-o']; break;
      case static::$status['SENT'] : return (object)['class' => 'warning', 'icon' => 'fa-circle-o-notch fa-spin']; break;
      case static::$status['PAID'] : return (object)['class' => 'success', 'icon' => 'fa-check']; break;
    }
  }
}
