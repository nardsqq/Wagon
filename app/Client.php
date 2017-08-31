<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $table = 'tblClient';
    protected $fillable = [ 'strClientName', 'strClientAddLotNum', 'strClientAddStreet', 'strClientAddBrgy', 'strClientAddCity', 'strClientAddProv', 'strClientTelephone', 'strClientFax', 'strClientMobile', 'strClientEmailAddress', 'strClientTIN'];
    protected $primaryKey = 'intClientID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    

    public static $rules = [
      'strClientName' => 'required',
    ];
}
