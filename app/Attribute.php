<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
  protected $table = 'tblAttribute';
  protected $fillable = ['strAttribName'];
  protected $primaryKey = 'intAttribID';
  public $timestamps = false;

  public function post()
  {
  	return $this->belongsToMany('App\Product', 'tblFeatureSet', 'int_FS_Prod_ID', 'int_FS_Attrib_ID');
  }
}
