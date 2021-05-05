<?php

namespace Nanuc\LaravelHumHub\Models;

class ContentContainer
{
    public function __construct(
        public $id,
        public $guid = null,
    ){}
}
