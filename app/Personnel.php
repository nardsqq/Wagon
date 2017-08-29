<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'tblPersonnel';
    protected $fillable = ['intPers_Role_ID', 'strPersFName', 'strPersMName', 'strPersLName'];
    protected $primaryKey = 'intPersID';
    public $timestamps = false;

    public function roles() 
    {
      return $this->belongsTo('App\Role', 'intPers_Role_ID');
    }

    public function attribs() 
    {
      return $this->belongsToMany('App\Attribute', 'tblFeatureSet', 'intFS_Prod_ID', 'intFS_Attrib_ID');
    }

    public static $rules = [
      'strProdName' => 'required|unique_with:tblproduct, intP_ProdCateg_ID, strProdHandle',
      'intP_ProdCateg_ID' => 'required'
    ];
}
