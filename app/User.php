<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use   Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstName', 'lastName', 'email', 'password', 'password_confirmation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * A user can have many cards.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Cards()
    {
        return $this->hasMany(\App\Card::class);
    }


    /**
     * A user can have many journeys.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    //public function journeys()
    //{
      //  return $this->hasMany(\App\Journey::class);
   // }



}
