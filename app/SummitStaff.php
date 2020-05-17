<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SummitStaff extends Model
{
    //

    protected $table = "summit_staff";

    protected $fillable = ['id', 'AccUserID', 'Firstname', 'Lastname','EmailAddress','PhoneNumber'];


    public function users()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function CvManage(){
      return $this->hasMany('App\CVManagement','staffID');
    }

}
