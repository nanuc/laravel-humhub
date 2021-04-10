<?php

namespace Nanuc\LaravelHumHub\Facades;

use Illuminate\Support\Facades\Facade;

class HumHub extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'humhub';
    }
}