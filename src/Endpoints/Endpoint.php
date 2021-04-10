<?php

namespace Nanuc\LaravelHumHub\Endpoints;

use Illuminate\Support\Facades\Http;

class Endpoint
{
    protected $token;

    public function __construct($token = null)
    {
        $this->token = $token ?? config('services.humhub.token');
    }

    public function post($url, $data)
    {
        return Http::withToken($this->token)->post($this->getUrl($url), $data);
    }

    public function get($url)
    {
        return Http::withToken($this->token)->get($this->getUrl($url));
    }

    private function getUrl($url)
    {
        return config('services.humhub.url') . '/' . $this->endpointUrl . '/' . $url;
    }
}
