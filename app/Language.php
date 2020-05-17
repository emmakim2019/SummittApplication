<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
	  //Set table for model
  protected $table = 'language';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
  	"CV_ID",
    "Language1",
    "Fluency1",
    "Language2",
    "Fluency2",
    "Language3",
    "Fluency3",
    "Language4",
    "Fluency4",
  	"Language5",
  	"Fluency5",
  ];

}
