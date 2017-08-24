<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AttribType;

class Attribute extends Model
{

  protected $table = 'tblAttribute';
  protected $fillable = ['strAttribName, intAttribType'];
  protected $primaryKey = 'intAttribID';
  public $timestamps = false;

  protected $appends = ['attrib_type'];

  public function getAttributeType()
  {
	return AttribType::getName($this->intAttribType);
  }

  public function product()
  {
  	return $this->belongsToMany('App\Product', 'tblFeatureSet', 'int_FS_Prod_ID', 'int_FS_Attrib_ID');
  }

}
