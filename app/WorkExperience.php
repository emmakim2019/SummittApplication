<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{

  protected $table = 'work_exp';
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
  'CV_ID', 'Title', 'Company', 'Sector', 'Industry_Functions', 'JobType', 'StartDate', 'CurrentDate', 'EndDate', 'Line_Manager_Name', 'Line_Manager_Designation', 'MonthlyGrossSalary', 'CurrencyID', 'Referee_Name', 'Referee_Designation', 'Referee_Email', 'Referee_Name2', 'Referee_Designation2', 'Referee_Email2', 'Referee_Name3', 'Referee_Designation3', 'Referee_Email3', 'Referee_Contact', 'ReasonForLeaving', 'Referee_Phone', 'Referee_Phone2', 'Referee_Phone3'
  ];

}
