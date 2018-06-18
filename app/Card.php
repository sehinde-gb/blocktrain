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
         'journey_id', 'name', 'address', 'home_phone', 'mobile_phone', 'email', 'balance'
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


    /**
     *  A card belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
