<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Response;

class Authenticate extends Middleware
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return string|void
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            abort(Response::HTTP_UNAUTHORIZED);
        }
    }
}
