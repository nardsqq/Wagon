<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
  protected $table = 'tblAttribute';
  protected $fillable = ['strAttribName'];
  protected $primaryKey = 'intAttribID';
  public $timestamps = false;
}
