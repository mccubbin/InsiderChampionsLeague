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
        // create 10 users
        if (\App\User::count() == 0) {
            factory(\App\User::class, 10)->create();
        }

        // create 4 teams
        if (\App\Team::count() == 0) {
            factory(\App\Team::class, 4)->create();
        }

        // create 10 matches among the 4 teams
        if (\App\Match::count() == 0) {
            factory(\App\Match::class, 10)->create();
        }

        // create stats for each team for every match
        if (\App\TeamMatch::count() == 0) {
            factory(\App\TeamMatch::class, 20)->create();
        }
    }
}
