<?php

namespace Nanuc\LaravelHumHub;

use Nanuc\LaravelHumHub\Endpoints\Authentication;

class HumHub
{
    public function authentication($token = null)
    {
        return new Authentication($token);
    }
}