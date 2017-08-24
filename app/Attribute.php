<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AttribType;

class Attribute extends Model
{

  protected $table = 'tblAttribute';
  protected $fillable = ['strAttribName'];
  protected $primaryKey = 'intAttribID';
  public $timestamps = false;

  public function product()
  {
  	return $this->belongsToMany('App\Product', 'tblFeatureSet', 'int_FS_Prod_ID', 'int_FS_Attrib_ID');
  }

}
