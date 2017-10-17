<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $table = 'tblDimension';
	protected $primaryKey = 'intDimenID';
	protected $guarded = [];
	public $timestamps = false;
}
