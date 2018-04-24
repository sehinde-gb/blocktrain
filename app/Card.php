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
         'current_balance', 'balance'
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

    /**
     * A card can have many journeys.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
        public function journeys()
        {
            return $this->hasMany(\App\Journey::class);
        }


}
