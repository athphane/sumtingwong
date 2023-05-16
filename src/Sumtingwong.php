<?php

namespace Athphane\Sumtingwong;

use Closure;

class Sumtingwong
{
    /**
     * The callback that should be used to authenticate Sumtingwong users.
     *
     * @var Closure
     */
    public static $authUsing;

    public static function check($request): bool
    {
        return (static::$authUsing ?: function () {
            return app()->environment('local');
        })($request);
    }

    /**
     * Set the callback that should be used to authenticate Sumtingwong users.
     */
    public static function auth(Closure $callback): static
    {
        static::$authUsing = $callback;

        return new static;
    }
}
