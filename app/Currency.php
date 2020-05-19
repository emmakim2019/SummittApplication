<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
	  //Set table for model
  protected $table = 'currency';
  public $timestamps = false;
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
  'CurrencyName', 'CurrencyRate'
];

}
