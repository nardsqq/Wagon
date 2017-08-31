<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel extends Model
{
    use SoftDeletes;

    protected $table = 'tblPersonnel';
    protected $fillable = ['intPers_Role_ID', 'strPersFName', 'strPersMName', 'strPersLName'];
    protected $primaryKey = 'intPersID';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function roles() 
    {
      return $this->belongsTo('App\Role', 'IntPers_Role_ID');
    }

    public static $rules = [
      'strPersFName' => 'required|unique_with:tblPersonnel, strPersMName, strPersLName',
      'intPers_Role_ID' => 'required'
    ];
}
