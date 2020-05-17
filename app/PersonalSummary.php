<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalSummary extends Model
{

  //Set table for model
  protected $table = 'personal_summary';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'CV_ID', 'Attributes', 'Skills','HardSkills'
  ];

}
