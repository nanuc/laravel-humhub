<?php

namespace Nanuc\LaravelHumHub;

use Nanuc\LaravelHumHub\Endpoints\Authentication;
use Nanuc\LaravelHumHub\Endpoints\Content;
use Nanuc\LaravelHumHub\Endpoints\Post;
use Nanuc\LaravelHumHub\Endpoints\Space;
use Nanuc\LaravelHumHub\Endpoints\Topic;

class HumHub
{
    protected $token;

    public function withToken($token)
    {
        $this->token = $token;
        return $this;
    }

    public function authentication(): Authentication
    {
        return new Authentication($this->token);
    }

    public function space($token = null): Space
    {
        return new Space();
    }

    public function content($token = null): Content
    {
        return new Content();
    }

    public function topic(): Topic
    {
        return new Topic($this->token);
    }

    public function post(): Post
    {
        return new Post($this->token);
    }
}