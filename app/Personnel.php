<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel extends Model
{
    use SoftDeletes;

    protected $table = 'tblPersonnel';
    protected $fillable = ['intPers_Role_ID', 'strPersEmpType','strPersFName', 'strPersMName', 'strPersLName', 'strPersMobNo'];
    protected $primaryKey = 'intPersID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function roles() 
    {
      return $this->belongsTo('App\Role', 'intPers_Role_ID');
    }

    public static $rules = [
      'strPersFName' => 'required|max:45|unique_with:tblPersonnel, strPersMName, strPersLName',
      'intPers_Role_ID' => 'required'
    ];
}
