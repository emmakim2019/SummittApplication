<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreQualAnswers extends Model
{
    //Set table for model
  protected $table = 'pre_qual_answers';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    ' AnswersID','PreQualTestID', 'Answers', 'Marks'
  ];

}
