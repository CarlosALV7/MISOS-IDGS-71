<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    protected $except = [
        //
    'auth/facebook/callback',
    'auth/google/callback',
    'http://127.0.0.1:8000/',
    'http://127.0.0.1:8000/api'
    ];
}
