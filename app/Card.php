<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Journey;

class Card extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'journey_id','current_balance', 'balance'
    ];


    /**
     *  A card has many journeys.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function journeys()
    {
        return $this->hasMany(\App\Journey::class);
    }



}
