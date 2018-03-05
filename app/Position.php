<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use SoftDeletes;
    
    protected $table = 'tbl_position';
    protected $primaryKey = 'int_position_id';

    public static $rules = [
        'str_position_name' => 'required|min:2|unique:tblRole|max:45|regex:/^[a-z ,.\'-]+$/i',
      	'str_position_desc' => 'min:2|max:50|regex:/^[a-z ,.\'-]+$/i'
    ];
}
