<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'tblclient';
    protected $primaryKey = 'intClientID'; 
    public $timestamps = false;
}
