<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CvTable extends Model
{
	  //Set table for model
  protected $table = 'cv_table';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
     "CV_ID",            
     "Gender",           
     "DOB",              
     "PhoneNumber",      
     "Contactable",      
     "SkypeContact",     
     "LinkedInContact",  
     "PO_BOX",           
     "PhysicalAddress",  
     "Nationality",      
     "Identification",   
     "Passport_No",      
     "Passport_Country", 
     "ID_No" ,           
     "ID_Country",       
     "DL" ,              
     "CarOwner",         
     "CandidateRegID",   
     "PersonalSummary",  
     "Blacklisted"
  ];


  public function JobCVs(){
      return $this->hasMany('App\JobCV','CV_ID','CV_ID');
    }


   public function RegDetails(){

      return $this->belongsTo('App\RegistrationDetails', 'CandidateRegID','CanditateRegID');
    }
}
