<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
   
  //Set table for model
  protected $table = 'subjects';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'SubjectTitle'
  ];
}
