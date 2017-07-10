<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'tblClient';
    protected $primaryKey = 'intClientID'; 
    public $timestamps = false;

    public static $new_rules = [
    	'strClientName' => 'required|unique:tblclient|max:45',
        'strClientAddress' => 'required|unique_with:tblclient,strClientName|max:45',
        'strClientTelephone' => 'required|unique_with:tblclient|max:8',
        'strClientFax' => 'required|unique_with:tblclient,strClientName:max:45',
    	'strClientEmail' => 'required|unique_with:tblclient,strClientName|max:45',
        'strClientMobile' => 'required|unique_with:tblclient,strClientName|max:11'
    ];

    public static $update_rules = [
        'strClientName' => 'required|unique:tblclient,strAddress,ignore:id = intClientID|max:45',
        'strClientAddress' => 'required|unique_with:tblclient,strClientName|max:45',
        'strClientTelephone' => 'required|unique_with:tblclient|max:8',
        'strClientFax' => 'required|unique_with:tblclient,strClientName:max:45',
    	'strClientEmail' => 'required|unique_with:tblclient,strClientName|max:45',
        'strClientMobile' => 'required|unique_with:tblclient,strClientName|max:11'
    ];
}
