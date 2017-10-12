<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitOfMeasurement extends Model
{
    use SoftDeletes;

    protected $table = 'tblUOM';
    protected $fillable = ['strUOMUnit', 'strUOMUnitName'];
    protected $primaryKey = 'intUOMID';
    public $timestamps = false;


    public static $rules = [
        'strUOMUnit' => 'required',
        'strUOMUnitName' => 'required'
    ];
}
