<?php

namespace Athphane\Sumtingwong\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Athphane\Sumtingwong\Sumtingwong
 */
class Sumtingwong extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Athphane\Sumtingwong\Sumtingwong::class;
    }
}
