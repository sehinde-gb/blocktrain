<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to', 'startingCity', 'endingCity', 'description', 'type', 'passengerType', 'mode', 'endingFare', 'balance','current_balance'
    ];


    /**
     *  A card belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    //public function user()
    //{
      //  return $this->belongsTo(\App\User::class);
    //}




}
