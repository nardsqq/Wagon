<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgressChecklist extends Model
{
    
    protected $table = 'tblProgressChecklist';
    protected $primaryKey = 'intCheckID';
    protected $guarded = [];
    protected $dates = ['dtmAsOf'];
    public $timestamps = false;

    public function pivot() 
    {
        return $this->belongsTo('App\ServiceChecklist', 'intCL_ServCL_ID');
    }
}
