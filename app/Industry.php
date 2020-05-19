<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
	//Set table for model
    protected $table = 'industry';
    public $timestamps = false;

    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
  'Name', 'Parent', 'Details'
];

}
