<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

  protected $table = 'tblAttribute';
  protected $fillable = ['strAttribName'];
  protected $primaryKey = 'intAttribID';
  public $timestamps = false;

  public function products()
  {
  	return $this->belongsToMany('App\Product', 'tblFeatureSet', 'intFS_Attrib_ID', 'intFS_Prod_ID');
  }

}
