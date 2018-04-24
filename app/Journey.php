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
        'from', 'to', 'startingCity', 'endingCity', 'description', 'type', 'passengerType', 'mode', 'endingFare', 'balance'
    ];

    /**
     *  A journey belongs to a card.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card()
    {
        return $this->belongsTo(\App\Card::class);
    }

}
