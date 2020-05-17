<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfQual extends Model
{
   
  //Set table for model
  protected $table = 'prof_qual';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'CV_ID', 'ProfessionalQualifications', 'Other', 'StartDate', 'EndDate', 'ProfQualTitle',
  ];
}
