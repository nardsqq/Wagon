<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactDetail extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_contact_detail';
    protected $primaryKey = 'int_contact_id';
    protected $guarded = [];

    public function client()
    {
        return $this->belongsTo('App\Client', 'int_cd_client_id');
    }
}
