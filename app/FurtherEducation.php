<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FurtherEducation extends Model
{
  //Set table for model
  protected $table = 'further_education';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'CV_ID', 'FormalEducation', 'FormalEducation2', 'FormalEducation3', 'FurtherEducation', 'QualificationTitle', 'QualStartGradDate', 'QualEndGradDate', 'Institution', 'Subjects', 'Specialization'
  ];

}

