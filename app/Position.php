<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;
    
    protected $table = 'tbl_position';
    protected $primaryKey = 'int_position_id';

    public static $rules = [
        'str_position_name' => 'required|min:2|unique:tbl_position|max:45|regex:/^[a-z ,.\'-]+$/i',
      	'txt_position_desc' => 'min:2|max:50|regex:/^[a-z ,.\'-]+$/i'
    ];
}
