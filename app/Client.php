<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_client';
    protected $primaryKey = 'int_client_id';
    protected $appends = ['contact'];
    protected $guarded = [];

    public function contact_details()
    {
        return $this->hasMany('App\ContactDetail', 'int_cd_client_id_fk');
    }

    public function getContactAttribute(){
      return $this->contact_details->count() > 0 ? $this->contact_details()->first()->str_contact_detail : null;
    }
}
