<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
	   
  //Set table for model
  protected $table = 'specialization';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'SpecializationID', 'SpecializationTitle'
  ];
}
