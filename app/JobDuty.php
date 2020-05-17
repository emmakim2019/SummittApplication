<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDuty extends Model
{
    //

    protected $table = 'job_duties';


    public function JobAd(){

    	return $this->belongsTo('App\JobAd', 'ID');
    }
    
}
