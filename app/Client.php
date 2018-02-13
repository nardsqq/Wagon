<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_client';
    protected $primaryKey = 'int_client_id';
    protected $guarded = [];

    // public function contact_details()
    // {
    //     return $this->hasMany('App\ContactDetail', 'int_cd_client_id');
    // }

    public static $rules = [
      'str_client_name' => 'required',
    ];
}
