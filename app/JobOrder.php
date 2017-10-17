<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobOrder extends Model
{
    use SoftDeletes;
    
    protected $table = 'tblJobOrder';
    protected $primaryKey = 'intJobOrderID';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function checklist(){
        return $this->hasMany('App\ProgressChecklist','intCL_JO_ID', 'intJobOrderID');
    }
}
