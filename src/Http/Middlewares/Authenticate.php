<?php

namespace Athphane\Sumtingwong\Http\Middlewares;

use Athphane\Sumtingwong\Sumtingwong;

class Authenticate
{
    public function handle($request, $next)
    {
        return Sumtingwong::check($request) ? $next($request) : abort(403);
    }
}
