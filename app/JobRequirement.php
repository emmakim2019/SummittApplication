<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobRequirement extends Model
{
    //

    protected $table= "job_reqs";

    protected $fillable = ['ID','JobID','Requirement'];
}
