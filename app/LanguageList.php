<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageList extends Model
{
      //Set table for model
  protected $table = 'languagelist';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'LanguageListID', 'LanguageName'
  ];

}
