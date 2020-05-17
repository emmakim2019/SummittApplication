<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperienceResponsibility extends Model
{

  protected $table = 'work_exp_resp';
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
  'WorkExpID', 'Responsibility', 'Responsibility2', 'Responsibility3', 'Responsibility4', 'Responsibility5', 'Achievement', 'Achievement2', 'Achievement3', 'Achievement4', 'Achievement5'
  ];

}
