<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = [
      'intShipID',
      'strShipName',
    ];

    protected $table = 'tblShip';
    protected $primaryKey = 'intShipID';
    public $timestamps = false;
}
