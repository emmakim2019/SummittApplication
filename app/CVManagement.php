<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CVManagement extends Model
{
    //
    protected $table = "cv_management";

    protected $fillable = ['id','section_id','comment','staffID','CV_ID'];



   public function StaffDetails(){

      return $this->belongsTo('App\SummitStaff','staffID','id');
    }
}
