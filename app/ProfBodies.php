<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfBodies extends Model
{
   
  //Set table for model
  protected $table = 'prof_bodies';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'CV_ID', 'ProfessionalBody', 'Other', 'StartDate', 'EndDate', 'ProfBodyTitle'
  ];
}
