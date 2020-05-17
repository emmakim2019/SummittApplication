<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationDetails extends Model
{
    
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'Firstname', 'Lastname', 'EmailAddress', 'AccUserID','CVUpload', 'CandidatePhoto'
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'RegistrationDate' => 'datetime',
  ];


  public function CVs(){
      return $this->hasMany('App\CvTable','CanditateRegID','CandidateRegID');
    }

}
