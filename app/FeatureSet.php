<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureSet extends Model
{
  protected $table = 'tblFeatureSet';
  protected $fillable = ['intFS_Prod_ID', 'intFS_Attrib_ID'];
  protected $primaryKey = 'intFeatSetID';
  public $timestamps = false;
}
