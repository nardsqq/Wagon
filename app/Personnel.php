<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_personnel';
    protected $primaryKey = 'int_personnel_id';
    protected $appends = array('name');

    public function positions()
    {
        return $this->belongsTo('App\Position', 'int_pers_position_id_fk');
    }

    public function getNameAttribute(){
        return $this->str_personnel_l_name.', '.$this->str_personnel_f_name.' '.$this->str_personnel_m_name;
    }
}
