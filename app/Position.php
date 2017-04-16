<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $fillable = [
      'intPositionID',
      'strPositionName',
      'strDesc',
    ];

    protected $table = 'tblposition';
    protected $primaryKey = 'intPositionID'; 
    public $timestamps = false;

    public static $new_rules = [
    	'strPositionName' => 'required|unique:tblposition|max:45',
        'strDesc' => 'max:25'
    ];

    public static $update_rules = [
        'strPositionName' => 'required|unique:tblposition|max:45',
        'strDesc' => 'max:25'
    ];
}
