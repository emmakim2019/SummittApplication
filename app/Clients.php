<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    //

    protected $table = 'client_info';


     public function JobAd()
  {
    return $this->hasMany('App\JobAd', 'ClientID','ClientID');
  }

}
