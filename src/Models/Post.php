<?php

namespace Nanuc\LaravelHumHub\Models;

class Post
{
    public function __construct(
        public $id,
        public $message = null,
        public $content = null,
    ){}
}
