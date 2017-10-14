<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UOM extends Model
{
    use SoftDeletes;

  	protected $table = 'tblUOM';
  	protected $fillable = ['strUOMUnit', 'strUOMUnitName'];
  	protected $primaryKey = 'intUOMID';
  	protected $dates = ['deleted_at'];
  	public $timestamps = false;
}
