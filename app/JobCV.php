<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCV extends Model
{
    //Set table for model
  protected $table = 'job_cv';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'JobCVID', 'CV_ID', 'Job_adID', 'CandidateMarks', 'MarkRead'
	];
  

    public function JobAd(){

      return $this->belongsTo('App\JobAd', 'ID');
    }
  
   public function Candidates(){

      return $this->belongsTo('App\CVTable', 'CV_ID','CV_ID');
    }

}
