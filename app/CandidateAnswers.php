<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateAnswers extends Model
{
  //Set table for model
  protected $table = 'candidate_answers';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'CandidateAnswersID', 'AnswerID', 'ID', 'CV_ID','Answer'
  ];

}

