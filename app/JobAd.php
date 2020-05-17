<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAd extends Model
{
    //Set table for model
  protected $table = 'job_ad';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'ClientID', 'JobTitle', 'Category', 'Summary', 'MinEduReq', 'JobType', 'LocationCity', 'LocationCountry', 'SalCurrency', 'GrossMonthSal', 'ShowSal', 'CareerLevel', 'Deadline', 'Revenue', 'AnnualPercentageRevenue', 'CandidatePlaced', 'StaffID'
	];


   public function Clients()
    {
        return $this->belongsTo('App\Clients', 'ClientID','ClientID');
    }

    public function JobIndustries()
    {
        return $this->belongsTo('App\Industry', 'ID');
    }

    public function JobRequirements(){
      return $this->hasMany('App\JobRequirement','JobID');
    }

     public function JobDuties(){
      return $this->hasMany('App\JobDuty','JobID');
    }

    public function JobCVs(){
      return $this->hasMany('App\JobCV','Job_adID');
    }
}
