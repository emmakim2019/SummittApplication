<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherInterest extends Model
{
  //Set table for model
  protected $table = 'other_interests';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'OtherInterestsID', 'CV_ID', 'Interests','Interests2','Interests3','Interests4','Interests5'
  ];
}
