<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HardSkill extends Model
{
  //Set table for model
  protected $table = 'hardskills';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'ID', 'Name', 'Parent','Details'
  ];
}
