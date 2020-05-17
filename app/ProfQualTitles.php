<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfQualTitles extends Model
{
   
  //Set table for model
  protected $table = 'prof_qual_titles';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'profqualtitle'
  ];
}
