<?php

namespace Nanuc\LaravelHumHub\Endpoints;

use Illuminate\Support\Facades\Http;
use Nanuc\LaravelHumHub\HumHubResponse;
use Illuminate\Support\Str;

class Endpoint
{
    protected $token;

    public function __construct($token = null)
    {
        $this->token = $token ?? config('services.humhub.token');
    }

    public function post($url = null, $data = [])
    {
        return new HumHubResponse(Http::withToken($this->token)->post($this->getUrl($url), $data));
    }


    public function put($url = null, $data = [])
    {
        return new HumHubResponse(Http::withToken($this->token)->put($this->getUrl($url), $data));
    }

    public function get($url)
    {
        return new HumHubResponse(Http::withToken($this->token)->get($this->getUrl($url)));
    }

    private function getUrl($url = null)
    {
        return config('services.humhub.url') . '/' . $this->getEndpointUrl() . ($url ? '/' . $url : '');
    }

    private function getEndpointUrl()
    {
        return $this->endpointUrl ?? Str::kebab((new \ReflectionClass($this))->getShortName());
    }
}
