<?php

namespace Nanuc\LaravelHumHub;

use Nanuc\LaravelHumHub\Endpoints\Authentication;
use Nanuc\LaravelHumHub\Endpoints\Content;
use Nanuc\LaravelHumHub\Endpoints\Post;
use Nanuc\LaravelHumHub\Endpoints\Space;
use Nanuc\LaravelHumHub\Endpoints\Topic;
use Nanuc\LaravelHumHub\Endpoints\User;

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

    public function user(): User
    {
        return new User($this->token);
    }

    public function space(): Space
    {
        return new Space($this->token);
    }

    public function content(): Content
    {
        return new Content($this->token);
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