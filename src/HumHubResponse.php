<?php

namespace Nanuc\LaravelHumHub;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;

class HumHubResponse
{
    public function __construct(
        public Response $response,
    ) {}

    public function values($keys)
    {
        return Arr::only($this->response->json(), $keys);
    }

    public function collect($key)
    {
        return collect($this->response->json($key));
    }

    public function __call($method, $arguments)
    {
        return $this->response->$method(...$arguments);
    }
}