<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use Notifiable;
    //
    protected $table = 'tickets';

    protected $fillable = [
	  	"id",
	    "type",
	    "user_id",
	    "description",
	    "status",
	    "response",
	    "reponder_id",
	    "created_at",
	    "updated_at",
  	];

}
