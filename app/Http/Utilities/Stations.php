<?php

namespace  App\Http\Utilities;


class Stations
{

    protected static $stations = [
       "Mill Hill Broadway" => 'mh',
       "Sudbury" => 'sd'



    ];


    public static function all()
    {
        return array_keys(static::$stations);
    }






}