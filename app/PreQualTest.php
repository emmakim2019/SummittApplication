<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreQualTest extends Model
{
    //Set table for model
  protected $table = 'pre_qual_test';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'PreQualTestID', 'ID', 'Question'
  ];

}
