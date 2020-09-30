<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function terminate()
    {
        if (\App\User::count() == 0) {
            factory(\App\User::class, 10)->create();
        }
        if (\App\Team::count() == 0) {
            factory(\App\Team::class, 4)->create();
        }
    }
}
