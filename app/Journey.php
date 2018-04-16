<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'startingCity', 'endingCity', 'description', 'type', 'passengerType', 'mode', 'endingFare', 'balance'
    ];
}
