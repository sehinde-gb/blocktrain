<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'https://api.tfl.gov.uk/StopPoint/Search?query=',
        '/api/card',
        'api/card/*/journey',
        'api/card/*/journey/*',
        'auth/login'


    ];
}
