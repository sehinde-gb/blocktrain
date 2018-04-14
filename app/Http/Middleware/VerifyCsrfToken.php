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
        '/api/journey',
        'https://api.tfl.gov.uk/StopPoint/Search?query=',
        '/api/cards',
        '/api/end',
        '/api/start'

    ];
}
