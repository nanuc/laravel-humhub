<?php

namespace Nanuc\LaravelHumHub\Models;

class Topic
{
    public function __construct(
        public $id,
        public $name = null,
    ){}
}
