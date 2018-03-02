<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_personnel';
    protected $primaryKey = 'int_personnel_id';
    protected $guarded = [];
}
